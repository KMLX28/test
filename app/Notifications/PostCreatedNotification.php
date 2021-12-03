<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $post;
    private Website $website;

    public function __construct(Post $post, Website $website)
    {
        $this->post = $post;
        $this->website = $website;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->line('post has been published to ' . $this->website->name)
            ->action('Post Link', route('posts.show', $this->post))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
