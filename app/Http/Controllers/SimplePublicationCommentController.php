<?php

namespace App\Http\Controllers;

//use App\Events\NewComment;
use App\Http\Requests\StoreSimplePublicationCommentRequest;
use App\Http\Resources\SimplePublicationCommentCollection;
use App\Http\Resources\SimplePublicationCommentResource;
use App\Models\SimplePublicationComment;
use App\Models\SimplePublication;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;


class SimplePublicationCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $this->authorize(SimplePublicationComment::class);
        return new SimplePublicationCommentCollection(SimplePublicationComment::with('user')->where('simple_publication_id', $id)->orderBy('id', 'desc')->cursorPaginate(3));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreSimplePublicationCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, StoreSimplePublicationCommentRequest $request)
    {
        $post = SimplePublication::find($id);
        $this->authorize(SimplePublicationComment::class);

        $comment = SimplePublicationComment::create([
            "description" => $request->description,
            "user_id" => $request->user()->id,
            "simple_publication_id" => $id,
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
        $comment = SimplePublicationComment::find($id);
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
        $comment = SimplePublicationComment::find($id);
        $this->authorize($comment);
        $postId = $comment->simple_publication_id;
        $comment->delete();

        /* DB::table('notifications')->where('data->post', $postId)->where('data->tipo', 'commentPost')->where('data->user->id', Auth::user()->id)->delete(); */

        return response()->json([
            "comments_count" => SimplePublication::find($postId)->comments()->count()
        ]);
    }
}
