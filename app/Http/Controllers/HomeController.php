<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\TweetCollection;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController
{
    public function index(Request $request)
    {
        $tweets = $request->user()
            ->tweetsFromFollowing()
            ->latest()
            ->paginate(20);

        return Inertia::render('Home', [
            'tweets' => new TweetCollection($tweets),
        ]);
    }
}
