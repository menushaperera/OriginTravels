<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingAssignedToAgentMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Booking $booking) {}

    public function build()
    {
        return $this->subject('New booking assigned to you – ORIGIN Travels')
            ->markdown('emails.booking.assigned_agent');
    }
}
