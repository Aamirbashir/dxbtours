<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data;

    public function __construct($dat)
    {
        $this->data = $dat;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


       return $this->from('aamir_bashir@live.com')
            ->view('emails.contactUs')->with('data', $this->data)
            ->subject('contactUs');
    }
}
