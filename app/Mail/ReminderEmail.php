<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $seminar;
    public $payment_method;
    public $accommodation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($seminar,$payment_method,$accommodation)
    {
        $this->seminar = $seminar;
        $this->payment_method = $payment_method;
        $this->accommodation=$accommodation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Amity Seminar Reminder")

            ->view('emails.RegistranReminder');
    }
}
