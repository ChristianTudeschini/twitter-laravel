<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function createTweet(Request $request) {
        $incomingFields = $request->validate([
            'body' => 'required'
        ]);

        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        Tweet::create($incomingFields);
        return redirect('/');
    }

    public function editTweet(Tweet $tweet, Request $request) {
        if (auth()->user()->id !== $tweet['user_id']) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'body' => 'required',
        ]);

        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $tweet->update($incomingFields);
        
        // TODO: Notify user that the changes were made
        return redirect('/');
    }

    public function deleteTweet(Tweet $tweet) {
        if (auth()->user()->id === $tweet['user_id']) {
            // TODO: Notify user that the tweet was deleted
            $tweet->delete();
        }
        
        return redirect('/');
    }

    public function showEditScreen(Tweet $tweet) {
        // TODO: Use Middleware (policy) for controlling user access for editing
        if (auth()->user()->id !== $tweet['user_id']) {
            return redirect('/');
        }

        return view('edit-tweet', ['tweet' => $tweet]);
    }
}