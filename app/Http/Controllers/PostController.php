<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create', [
            'websites' => cache()->remember('websites', now()->addDay(), fn() => Website::all())
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'website_id' => 'required|exists:websites,id',
            'title' => 'required|string|max:255',
            'body' => 'required'
        ]);

        $website = Website::find($request->website_id);

        $post = $website->posts()->create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        PostCreatedEvent::dispatch($post, $website);

        return redirect()->route('welcome')->with('success', 'post has been created successfully');
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
}
