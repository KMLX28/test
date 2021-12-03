<?php

namespace App\Listeners;


use App\Events\PostCreatedEvent;
use App\Mail\PostCreatedMail;
use App\Models\Subscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class PostCreatedListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(PostCreatedEvent $event)
    {
        $event
            ->website
            ->subscriptions
            ->each(fn(Subscription $subscription) => Mail::to($subscription->user_email)
                                                         ->send(new PostCreatedMail($event->post, $event->website)));
    }
}
