<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $cleanPassword;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $cleanPassword)
    {
        $this->user = $user;
        $this->cleanPassword = $cleanPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user-register');
    }
}
