<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTweetRequest;

class TweetController extends Controller
{
    public function store(StoreTweetRequest $request): void
    {
        $request->user()->tweets()->create($request->only('body'));
    }
}
