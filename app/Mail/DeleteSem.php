<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteSem extends Mailable
{
    use Queueable, SerializesModels;
    public $seminar;
    public $payment_method;
    public $mailsubject;
    public $accommodation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($seminar,$payment_method,$subject,$accommodation)
    {
        $this->seminar = $seminar;
        $this->payment_method = $payment_method;
        $this->mailsubject=$subject;
        $this->accommodation=$accommodation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mailsubject)
            ->view('emails.DeleteSem');
    }
}
