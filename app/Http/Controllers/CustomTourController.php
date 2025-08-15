<?php

namespace App\Http\Controllers;

use App\Models\CustomTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;                       // ← import Mail facade
use App\Mail\CustomTourConfirmation;                        // ← import your confirmation Mailable
use App\Mail\CustomTourRequest;                             // ← (optional) admin notification Mailable

class CustomTourController extends Controller
{
    /**
     * Display the custom tours form
     */
    public function index()
    {
        return view('customer.customtours');
    }

    /**
     * Store a new custom tour request
     */
    public function store(Request $request)
    {
        // STEP 1: Test if we're reaching the controller
        Log::info('=== CUSTOM TOUR FORM SUBMISSION ===');
        Log::info('Step 1: Controller reached successfully');
        
        try {
            // STEP 2: Log all incoming data
            Log::info('Step 2: Form data received', $request->all());
            
            // STEP 3: Check if Model exists
            if (!class_exists('\App\Models\CustomTour')) {
                Log::error('CustomTour model does not exist!');
                
                // Fallback using DB facade
                DB::table('custom_tours')->insert([
                    'full_name'       => $request->full_name,
                    'phone'           => $request->phone,
                    'email'           => $request->email,
                    'region'          => $request->region,
                    'country'         => $request->country,
                    'city'            => $request->city,
                    'flights'         => $request->flights,
                    'departure_city'  => $request->departure_city,
                    'departure_date'  => $request->departure_date,
                    'return_date'     => $request->return_date,
                    'flexible_dates'  => $request->has('flexible_dates') ? 1 : 0,
                    'adults'          => $request->adults,
                    'children'        => $request->children,
                    'infants'         => $request->infants,
                    'rooms'           => $request->rooms,
                    'hotel_category'  => $request->hotel_category,
                    'budget'          => $request->budget,
                    'travel_agency'   => $request->travel_agency,
                    'special_requests'=> $request->special_requests,
                    'created_at'      => now(),
                    'updated_at'      => now(),
                ]);
                
                Log::info('Step 3b: Data inserted using DB facade');
                
                return redirect()->route('customer.custom.tours')
                    ->with('success', 'Your custom tour request has been submitted successfully!');
            }
            
            Log::info('Step 3: Model exists');
            
            // STEP 4: Check if table exists
            if (!DB::getSchemaBuilder()->hasTable('custom_tours')) {
                Log::error('Table custom_tours does not exist!');
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Database table not found. Please run migrations.');
            }
            
            Log::info('Step 4: Table exists');
            
            // STEP 5: Try validation
            Log::info('Step 5: Starting validation');
            
            $validated = $request->validate([
                'full_name'        => 'required|string|max:255',
                'phone'            => 'required|string|max:50',
                'email'            => 'required|email|confirmed',
                // other fields optional…
            ]);
            
            Log::info('Step 6: Validation passed');
            
            // STEP 6: Prepare data
            $data = $request->except(['_token', 'email_confirmation']);
            $data['flexible_dates'] = $request->has('flexible_dates') ? 1 : 0;
            
            Log::info('Step 7: Data prepared', $data);
            
            // STEP 7: Try to create record
            $customTour = CustomTour::create($data);
            
            Log::info('Step 8: Record created successfully', ['id' => $customTour->id]);
            
            // ─── STEP 9: SEND CONFIRMATION EMAIL TO CUSTOMER ───
            Mail::to($customTour->email)
                ->send(new CustomTourConfirmation($customTour));
            Log::info('Step 9: Confirmation email sent to customer', ['email' => $customTour->email]);

            return redirect()->route('customer.custom.tours')
                ->with('success', 'Request received! A confirmation email was sent to you.');
            
            // ─── OPTIONAL STEP 10: NOTIFY ADMIN ───
            if (class_exists(\App\Mail\CustomTourRequest::class)) {
                Mail::to(config('mail.admin_email', 'admin@origintravels.com'))
                    ->send(new CustomTourRequest($customTour));
                Log::info('Step 10: Notification email sent to admin');
            }
            
            // Success!
            return redirect()->route('customer.custom.tours')
                ->with('success', 'Your custom tour request has been submitted successfully! We will contact you within 24 hours.');
                
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed', [
                'errors'  => $e->errors(),
                'message' => $e->getMessage(),
            ]);
            
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Validation failed: ' . implode(', ', array_map(fn($errs) => implode(', ', $errs), $e->errors())));
                
        } catch (\Exception $e) {
            Log::error('DETAILED ERROR:', [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
                'trace'   => $e->getTraceAsString(),
            ]);
            
            $errorMessage = config('app.debug')
                ? "Error: {$e->getMessage()} (Line {$e->getLine()} in " . basename($e->getFile()) . ")"
                : 'There was an error submitting your request. Please try again.';
            
            return redirect()->back()
                ->withInput()
                ->with('error', $errorMessage);
        }

        Mail::to($customTour->email)->send(new CustomTourProcessingMail($customTour));
    }
}
