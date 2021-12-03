<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('websites.index', [
            'websites' => cache()->remember('websites', now()->addDay(), fn() => Website::all())
        ]);
    }

    public function show(Website $website)
    {
        return view('websites.show', ['website' => $website]);
    }

}
