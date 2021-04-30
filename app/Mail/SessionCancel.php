<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SessionCancel extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct()
    {
        /* $this->data = $data; */
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->data['certificate_id']);
        return $this->from('noreply@thokhor-v3.aridiantechnologies.com','Thokhor')
                    ->subject('Session Cancelled')
                    ->view('dashboard.email.sample_report');
    }
}
