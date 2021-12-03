<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class PostCreatedMail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;
    private $post;
    private Website $website;

    public function __construct(Post $post, Website $website)
    {
        $this->post = $post;
        $this->website = $website;
    }

    public function build()
    {
        return $this->view('emails.post-created', [
            'website' => $this->website,
            'post' => $this->post,
        ]);
    }
}
