<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\UserResource;

use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Show a list of users.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        UserResource::withoutWrapping();

        return UserResource::collection(User::all());
    }

    /**
     * Show a given user.
     *
     * @param  \App\Models\User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }
}
