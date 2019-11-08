<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmacionRegistro extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Confirmar Registro al Evento";
    public $mensajeEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensajeEmail)
    {
        $this->mensajeEmail = $mensajeEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirmacion-registro');
    }
}
