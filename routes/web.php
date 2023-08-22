<?php

use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // Gets all tweets from the current user
    //$tweets = Tweet::where('user_id', auth()->id())->get();

    $tweets = [];
    if (auth()->check()) {
        $tweets = auth()->user()->usersTweets()->latest()->get();
    }

    return view('home', ['tweets' => $tweets]);
});

// User Routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Tweet Routes
Route::post('/create-tweet', [TweetController::class, 'createTweet']);
Route::get('/edit-tweet/{tweet}', [TweetController::class, 'showEditScreen']);
Route::put('/edit-tweet/{tweet}', [TweetController::class, 'editTweet']);
Route::delete('/delete-tweet/{tweet}', [TweetController::class, 'deleteTweet']);