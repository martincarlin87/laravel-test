<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\PostResource;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserPostsController extends Controller
{
    /**
     * Show the posts for the given user.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(User $user)
    {
        PostResource::withoutWrapping();

        return PostResource::collection($user->posts);
    }
}
