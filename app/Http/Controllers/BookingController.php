<?php

namespace App\Http\Controllers;

use App\Mail\BookingReceiptMail;
use App\Models\Booking;
use App\Models\Package;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Stripe\StripeClient;



class BookingController extends Controller
{
    /**
     * Show the booking/checkout page for a package.
     */
    public function show(Package $package, Request $request)
    {
        $defaults = [
            'pricing_mode'   => 'land_air', // preselect example
            'gateway'        => 'LAX',
            'travelers'      => 2,
            'rooms'          => 1,
            'departure_date' => now()->addMonths(1)->toDateString(),
        ];

        return view('checkout.show', [
            'package'   => $package,
            'defaults'  => $defaults,
            'stripeKey' => config('services.stripe.key'), // publishable key for Stripe.js
        ]);
    }

    /**
     * Create a pending Booking and a Stripe PaymentIntent.
     * Returns JSON: { clientSecret, bookingId }.
     */
    public function createIntent(Request $request)
    {
        $data = $request->validate([
            'package_id'      => 'required|exists:packages,id',
            'customer_name'   => 'required|string|max:190',
            'customer_email'  => 'required|email|max:190',
            'customer_phone'  => 'nullable|string|max:50',
            'departure_date'  => 'nullable|date',
            'pricing_mode'    => 'required|in:land_only,land_air',
            'gateway'         => 'nullable|string|max:20',
            'travelers'       => 'required|integer|min:1|max:20',
            'rooms'           => 'required|integer|min:1|max:10',
        ]);

        $package = Package::findOrFail($data['package_id']);

        // ----- Simple pricing example (adjust to your rules) -----
        $baseCents     = (int) round(((float) $package->price) * 100);
        $airAddonCents = 100000; // $1,000 per traveler for "Land + Air"
        $perTraveler   = $baseCents + ($data['pricing_mode'] === 'land_air' ? $airAddonCents : 0);
        $totalCents    = $perTraveler * (int) $data['travelers'];
        // ---------------------------------------------------------

        // Create a pending booking row (keep our own status values)
        $booking = Booking::create([
            'package_id'         => $package->id,
            'user_id'            => Auth::id(),
            'customer_name'      => $data['customer_name'],
            'customer_email'     => $data['customer_email'],
            'customer_phone'     => $data['customer_phone'] ?? null,
            'departure_date'     => $data['departure_date'] ?? null,
            'pricing_mode'       => $data['pricing_mode'],
            'gateway'            => $data['gateway'] ?? null,
            'travelers'          => $data['travelers'],
            'rooms'              => $data['rooms'],
            'currency'           => 'usd',
            'total_amount_cents' => $totalCents,
            'payment_status'     => Booking::STATUS_PENDING,
            'extras'             => [
                'package_title' => $package->title,
            ],
        ]);

        // Create Stripe PaymentIntent
        $stripe = new StripeClient(config('services.stripe.secret'));
        $pi = $stripe->paymentIntents->create([
            'amount'                     => $totalCents,
            'currency'                   => 'usd',
            'description'                => 'Booking #'.$booking->id.' - '.$package->title,
            'metadata'                   => [
                'booking_id' => (string) $booking->id,
                'package_id' => (string) $package->id,
                'user_id'    => (string) Auth::id(),
            ],
            'automatic_payment_methods'  => ['enabled' => true], // use Stripe.js to confirm
            'receipt_email'              => $data['customer_email'],
        ]);

        $booking->update([
            'payment_intent_id' => $pi->id,
            // Keep status = pending until we truly succeed
        ]);

        return response()->json([
            'clientSecret' => $pi->client_secret,
            'bookingId'    => $booking->id,
        ]);
    }

    /**
     * Called by the browser after stripe.confirmCardPayment succeeds.
     * Verify the PaymentIntent server-side, then mark booking paid,
     * generate invoice PDF, and email it to the customer.
     */
    public function verify(Request $request)
    {
        $payload = $request->validate([
            'booking_id'        => 'required|exists:bookings,id',
            'payment_intent_id' => 'required|string',
        ]);

        $booking = Booking::findOrFail($payload['booking_id']);

        // Make sure the PI id matches what we created for this booking
        if ($booking->payment_intent_id !== $payload['payment_intent_id']) {
            return response()->json(['ok' => false, 'message' => 'Mismatched Payment Intent.'], 422);
        }

        $stripe = new StripeClient(config('services.stripe.secret'));
        $pi     = $stripe->paymentIntents->retrieve($booking->payment_intent_id);

        // If paid in full
        if ($pi->status === 'succeeded' && (int) $pi->amount_received === (int) $booking->total_amount_cents) {
            // Try to fetch the latest charge to capture card details + receipt URL
            $charge = null;
            if (!empty($pi->latest_charge)) {
                $charge = $stripe->charges->retrieve($pi->latest_charge);
            }

            // Build an invoice number if missing
            $invoiceNumber = $booking->invoice_number ?: (
                'INV-' . now()->format('Ymd') . '-' . str_pad((string) $booking->id, 4, '0', STR_PAD_LEFT)
            );

            // Update booking as paid with card details
            $booking->update([
                'payment_status'        => Booking::STATUS_SUCCEEDED,
                'paid_at'               => now(),
                'payment_method_brand'  => $charge->payment_method_details->card->brand  ?? null,
                'payment_method_last4'  => $charge->payment_method_details->card->last4  ?? null,
                'receipt_url'           => $charge->receipt_url ?? null,
                'invoice_number'        => $invoiceNumber,
            ]);

            // Generate & store PDF invoice (if not already)
            $this->generateAndStoreInvoice($booking, $charge);

            // Email the receipt (with link/attachment as your Mailable handles)
            Mail::to($booking->customer_email)->send(new BookingReceiptMail($booking));

            return response()->json([
                'ok'       => true,
                'redirect' => route('checkout.success', $booking),
            ]);
        }

        // Reflect current Stripe state with our allowed values only
        $status = match ($pi->status) {
            'processing' => Booking::STATUS_PROCESSING,
            'canceled'   => Booking::STATUS_CANCELED,
            default      => Booking::STATUS_FAILED,
        };

        $booking->update(['payment_status' => $status]);

        return response()->json([
            'ok'      => false,
            'message' => 'Payment not completed.',
            'status'  => $pi->status ?? null,
        ], 400);
    }

    /**
     * Success page – only show if the booking is paid.
     */
    public function success(Booking $booking)
    {
        abort_unless($booking->payment_status === Booking::STATUS_SUCCEEDED, 404);
        return view('checkout.success', compact('booking'));
    }

    /**
     * Optional cancel page.
     */
    public function cancel()
    {
        return view('checkout.cancel');
    }

    /**
     * Download the invoice PDF (generate if missing).
     */
    public function downloadInvoice(Booking $booking)
    {
        abort_unless($booking->payment_status === Booking::STATUS_SUCCEEDED, 403);

        if (!$booking->invoice_pdf_path || !Storage::disk('local')->exists($booking->invoice_pdf_path)) {
            $this->generateAndStoreInvoice($booking);
        }

        $filename = ($booking->invoice_number ?? 'invoice_'.$booking->id).'.pdf';

        return Storage::download($booking->invoice_pdf_path, $filename);
    }

    /**
 * Generate and store the invoice PDF, then save its path on the model.
 */
    private function generateAndStoreInvoice(Booking $booking, $charge = null): void
    {
        // Make sure relations are loaded
        $booking->load('package');

        // Ensure we have a stable invoice number
        if (empty($booking->invoice_number)) {
            $booking->invoice_number = 'INV-' . now()->format('Ymd') . '-' . str_pad((string)$booking->id, 4, '0', STR_PAD_LEFT);
            $booking->save();
        }

        // Render Blade -> HTML first (easier to debug)
        $html = view('pdfs.invoice', [
            'booking' => $booking,
            'charge'  => $charge, // optional; your view may ignore it
        ])->render();

        // (Optional) save the html so you can open it in a browser if dompdf errors
        Storage::put('debug/invoice_'.$booking->id.'.html', $html);

        // Build PDF
        $pdf = Pdf::loadHTML($html)
            ->setPaper('a4')
            ->setWarnings(true)
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled'      => true,
            ]);

        // Persist the PDF
        $dir  = 'invoices';
        $file = 'invoice_'.$booking->id.'.pdf';
        $path = $dir.'/'.$file;

        // Storage::put will create the directory if needed
        Storage::put($path, $pdf->output());

        // Save the path on the booking
        $booking->update(['invoice_pdf_path' => $path]);
    }
}
