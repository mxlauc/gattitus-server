<?php

namespace App\Http\Controllers;

use App\Models\Reaction;
use App\Models\ReactionPost;
use App\Models\Post;
use Illuminate\Http\Request;

class ReactionPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $this->authorize('create', ReactionPost::class);
        $ownReaction = null;
        $post = Post::find($postId);
        if($post->reactions()->where('user_id', $request->user()->id)->exists()){
            $post->reactions()->detach(1);
        }else{
            $post->reactions()->attach(1, [
                'user_id' => $request->user()->id,
            ]);
            $ownReaction = Reaction::find(1);
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
