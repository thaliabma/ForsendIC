<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $url, $count;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url, $count)
    {
        $this->url = $url;
        $this->count = $count;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("ForsendIC - Redefinir senha da Secretaria")
                    ->view('Secretaria.redefinirSenha', ['url' => $this->url, 'count'=> $this->count]);
    }
}
