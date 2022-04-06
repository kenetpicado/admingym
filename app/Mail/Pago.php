<?php

namespace App\Mail;

use App\Models\Caja;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Pago extends Mailable
{
    use Queueable, SerializesModels;

    public $caja;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Caja $caja)
    {
        //
        $this->caja = $caja;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.pago')->subject('Recibo virtual');
    }
}
