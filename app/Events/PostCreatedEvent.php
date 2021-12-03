<?php

namespace App\Events;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Foundation\Events\Dispatchable;

class PostCreatedEvent
{
    use Dispatchable;

    public Post $post;
    public Website $website;

    public function __construct(Post $post, Website $website)
    {
        $this->post = $post;
        $this->website = $website;
    }
}
