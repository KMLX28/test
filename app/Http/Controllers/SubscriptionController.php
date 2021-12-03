<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'website_id' => 'required|exists:websites,id',
            'email' => 'required|email'
        ]);

        // refactor to scope.
        if (Subscription::where('website_id', $request->website_id)
                        ->where('user_email', $request->email)
                        ->exists()) {
            return back()->withErrors('You are already subscribed');
        }

        Subscription::create([
            'website_id' => $request->website_id,
            'user_email' => $request->email,
        ]);

        return redirect()->route('websites.index')->with('success', 'you have been subscribed successfully');
    }

    public function show(Subscription $subscription)
    {
        //
    }

    public function edit(Subscription $subscription)
    {
        //
    }

    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    public function destroy(Subscription $subscription)
    {
        //
    }
}
