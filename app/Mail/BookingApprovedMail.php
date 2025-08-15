<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public Booking $booking;
    public $agent;
    public string $invoiceUrl;

    public function __construct(Booking $booking)
    {
        $this->booking   = $booking->load(['package','agent']);
        $this->agent     = $this->booking->agent;
        $this->invoiceUrl = route('checkout.invoice', $this->booking); // requires APP_URL set
    }

    public function build()
    {
        return $this->subject('Your booking is approved – '.$this->booking->package->title)
                    ->markdown('emails.booking.approved', [
                        'booking'    => $this->booking,
                        'agent'      => $this->agent,
                        'invoiceUrl' => $this->invoiceUrl,
                    ]);
    }
}
