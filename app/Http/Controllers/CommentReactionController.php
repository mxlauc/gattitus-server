<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReactionCollection;
use App\Models\PostComment;
use App\Models\ReactionType;
use Illuminate\Http\Request;

class CommentReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($comment_id)
    {
        $post_comment = PostComment::findOrFail($comment_id);
        return new ReactionCollection($post_comment->reactions()->with('user.image', 'reactionType')->orderBy('id', 'DESC')->cursorPaginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  $post_comment_id)
    {
        $this->authorize('create', Reaction::class);
        $ownReaction = null;
        $post_comment = PostComment::findOrFail($post_comment_id);

        if($post_comment->reactions()->where('user_id', $request->user()->id)->exists()){
            $post_comment->reactions()->where('user_id', $request->user()->id)->delete();
        }else{
            $post_comment->reactions()->create([
                'user_id' => $request->user()->id,
                'reaction_type_id' => ReactionType::first()->id,
            ]);
            $ownReaction = ReactionType::find(1);
        }
        
        return [
            'own_reaction' => $ownReaction ? $ownReaction->name : null,
            'reactions_count' => $post_comment->reactions()->count()
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
