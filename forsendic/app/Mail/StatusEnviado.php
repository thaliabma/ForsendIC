<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusEnviado extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('ForsendIC - Mudança de Status')
        ->view('updateStatusEmail', [
            'status' => 'Enviado',
            'msg' => 'Isso significa que a sua documentação está correta e já foi enviada ao DRCA. Basta aguardar a resposta.'
        ]);
    }
}
