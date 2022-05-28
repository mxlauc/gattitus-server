<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class UserPostsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        return PostResource::collection(Post::with(['user.image', 'simple_post.image', 'bestComments.user.image', 'bestComments.myReaction', 'bestComments' => function($query){
            $query->withCount('reactions');
        }, 'myReaction', 'pets.image'])
        ->withCount('reactions', 'comments', 'pets', 'bestComments')
        ->where('user_id', $id)
        ->orderBy('created_at', 'DESC')
        ->get());
    }
}
