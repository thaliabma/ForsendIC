<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusDeferido extends Mailable
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
            'status' => 'Deferido',
            'msg' => 'Isso significa que a sua solicitação foi atendida! A Secretaria enviará um email com mais detalhes.'
        ]);
    }
}
