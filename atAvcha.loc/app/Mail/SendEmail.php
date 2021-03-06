<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data = false)
    {
       if($data){ $this->data = $data;}
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->data) {
            return $this->from(env('MAIL_ADMIN'))
                ->view(env('THEME') . '.admin.mail.letter', ['data' => $this->data])
                ->subject('Тема сообщения2');
        }
    }
}
