<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\SimplePost;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        //$this->authorizeResource(Post::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(Post::with('user.image', 'simple_post.image', 'bestComments.user.image', 'myReaction', 'pets.image')->withCount('reactions', 'comments', 'pets', 'bestComments')->orderBy('id', 'DESC')->get());
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
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);
        $post = Post::create([
            'user_id' => $request->user()->id,
        ]);
        
        $post->pets()->attach($request->pets);

        // TODO: asegurar que los gatos sean del usuario logeado

        SimplePost::create([
            'description' => $request->description,
            'post_id' => $post->id,
            'image_id' => $request->image_id,
        ]);

        return [
            "estado" => 'ok'
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
        return new PostResource(Post::with('user.image', 'simple_post.image', 'myReaction', 'pets.image')->withCount('reactions', 'comments', 'pets')->findOrFail($id));
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
        $post = Post::findOrFail($id);
        $this->authorize($post);
        $post->delete();

        return response()->json('ok');
    }
}
