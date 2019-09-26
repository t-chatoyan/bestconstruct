<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OfferMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    protected $offer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($offer)
    {
        $this->offer = $offer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.offer')->subject("Best Construct new offer")
            ->from('infobestconstruct@gmail.com', 'Best Construct')->with('offer', $this->offer);
    }
}
