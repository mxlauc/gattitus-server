<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReactionCollection;
use App\Http\Resources\ReactionResource;
use App\Models\Post;
use App\Models\Reaction;
use App\Models\ReactionType;
use Illuminate\Http\Request;

class PostReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id)
    {
        $post = Post::findOrFail($post_id);
        return new ReactionCollection($post->reactions()->with('user.image', 'reactionType')->orderBy('created_at', 'DESC')->cursorPaginate(6));
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
    public function store(Request $request, $postId)
    {
        $this->authorize('create', Reaction::class);
        $ownReaction = null;
        $post = Post::find($postId);
        if($post->reactions()->where('user_id', $request->user()->id)->exists()){
            $post->reactions()->where('user_id', $request->user()->id)->delete();
        }else{
            $post->reactions()->create([
                'user_id' => $request->user()->id,
                'reaction_type_id' => ReactionType::first()->id,
            ]);
            $ownReaction = ReactionType::find(1);
        }
        
        return [
            'own_reaction' => $ownReaction ? $ownReaction->name : null,
            'reactions_count' => $post->reactions()->count()
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
