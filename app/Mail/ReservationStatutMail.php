<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class reservationStatutMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $statut;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reservation, $statut)
    {
        $this->reservation = $reservation;
        $this->statut = $statut;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Status de votre reservation')
                    ->view('emails.reservation_statut');
    }
}
