<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistranRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $seminar;
    public $payment_method;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($seminar,$payment_method)
    {
        $this->seminar = $seminar;

        $this->payment_method = $payment_method;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Amity Seminar Registration Successful")

             ->view('emails.RegistranRegister');
    }
}
