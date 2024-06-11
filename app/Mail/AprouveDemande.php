<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AprouveDemande extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $textParam;
    public function __construct($text)
    {
        $this->textParam = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('stan@test.com')
            ->subject("Votre demande a été mise à jour")
            ->view('emails.mail',['textParam' => $this->textParam]);
    }
}
