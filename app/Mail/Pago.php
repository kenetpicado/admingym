<?php

namespace App\Mail;

use App\Models\Plan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Pago extends Mailable
{
    use Queueable, SerializesModels;

    public $plan;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Plan $plan)
    {
        //
        $this->plan = $plan;
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
