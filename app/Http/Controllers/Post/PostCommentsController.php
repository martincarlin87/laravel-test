<?php

namespace App\Http\Controllers\Post;

use App\Http\Resources\CommentResource;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostCommentsController extends Controller
{
    /**
     * Show the comments for the given post.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Post $post)
    {
        CommentResource::withoutWrapping();

        return CommentResource::collection($post->comments);
    }
}
