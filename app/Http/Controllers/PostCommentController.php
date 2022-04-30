<?php

namespace App\Http\Controllers;

//use App\Events\NewComment;
use App\Http\Requests\StorePostCommentRequest;
use App\Http\Resources\PostCommentCollection;
use App\Http\Resources\PostCommentResource;
use App\Models\PostComment;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;


class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $this->authorize(PostComment::class);
        return new PostCommentCollection(PostComment::with('user.image')->where('post_id', $id)->orderBy('id', 'desc')->cursorPaginate(5));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StorePostCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, StorePostCommentRequest $request)
    {
        $post = Post::find($id);
        $this->authorize(PostComment::class);

        $comment = PostComment::create([
            "description" => $request->description,
            "user_id" => $request->user()->id,
            "post_id" => $id,
            "gif_url" => $request->gif_url,
        ]);

        /* if($post->user_id != $request->user()->id){
            NewComment::dispatch($post, $request->user(), $comment);
        } */

        return response()->json([
            "id" => $comment->id,
            "comments_count" => $post->comments()->count()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = PostComment::find($id);
        $this->authorize($comment);
        $comment->update([
            "description" => $request->description
        ]);
        return response()->json("ok");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = PostComment::find($id);
        $this->authorize($comment);
        $postId = $comment->post_id;
        $comment->delete();

        /* DB::table('notifications')->where('data->post', $postId)->where('data->tipo', 'commentPost')->where('data->user->id', Auth::user()->id)->delete(); */

        return response()->json([
            "comments_count" => Post::find($postId)->comments()->count()
        ]);
    }
}
