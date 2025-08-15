<?php

namespace App\Mail;

use App\Models\CustomTour;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomTourConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /** @var CustomTour */
    public $customTour;

    /**
     * Inject the CustomTour model.
     */
    public function __construct(CustomTour $customTour)
    {
        $this->customTour = $customTour;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this
            ->subject('Thank You for Your Custom Tour Request')
            ->view('emails.custom-tour-confirmation');
    }
}
