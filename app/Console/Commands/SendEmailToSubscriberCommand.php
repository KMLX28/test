<?php

namespace App\Console\Commands;

use App\Mail\SubscribersMail;
use App\Models\Subscription;
use Illuminate\Console\Command;
use Mail;

class SendEmailToSubscriberCommand extends Command
{
    protected $signature = 'email:send {text}';

    protected $description = 'Command description';

    public function handle()
    {
        $text = $this->argument('text');
        $this->info("sending $text to subscribers");

        Subscription::all()
                    ->each(fn(Subscription $subscription) => Mail::to($subscription->user_email)
                                                                 ->send(new SubscribersMail($text)));
    }
}
