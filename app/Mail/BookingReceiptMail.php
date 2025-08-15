<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingReceiptMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Booking $booking) {}

    public function build()
    {
        $mail = $this->subject('Your Booking Receipt '.$this->booking->invoice_number)
            ->markdown('emails.booking.receipt', [
                'booking' => $this->booking,
                'package' => $this->booking->package,
            ]);

        if ($this->booking->invoice_pdf_path && file_exists(storage_path('app/'.$this->booking->invoice_pdf_path))) {
            $mail->attach(storage_path('app/'.$this->booking->invoice_pdf_path), [
                'as' => $this->booking->invoice_number.'.pdf',
                'mime' => 'application/pdf',
            ]);
        }

        return $mail;
    }
}
