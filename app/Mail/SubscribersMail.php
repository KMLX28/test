<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribersMail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function build()
    {
        return $this->view('emails.subscribers', ['text' => $this->text]);
    }
}
