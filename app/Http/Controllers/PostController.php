<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Image;
use App\Models\Pet;
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
        return PostResource::collection(Post::with(['user.image', 'simple_post.image', 'bestComments.user.image', 'bestComments.myReaction', 'bestComments' => function($query){
            $query->withCount('reactions');
        }, 'myReaction', 'pets.image'])->withCount('reactions', 'comments', 'pets', 'bestComments')->orderBy('created_at', 'DESC')->cursorPaginate(3));
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

        $image = Image::findOrFail($request->image_id);
        if($image->user_id !== $request->user()->id){
            abort(403);
        }

        $post = Post::create([
            'user_id' => $request->user()->id,
        ]);
        if($request->pets){
            $post->pets()->attach(Pet::whereIn('id', $request->pets)->where('user_id', $request->user()->id)->get());
        }
        

        SimplePost::create([
            'description' => $request->description,
            'post_id' => $post->id,
            'image_id' => $request->image_id,
        ]);
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
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);

        if($request->pets){
            $post->pets()->sync(Pet::whereIn('id', $request->pets)->where('user_id', $request->user()->id)->get());
        }

        $post->simple_post()->update([
            'description' => $request->description,
        ]);

        return [
            "estado" => 'ok'
        ];
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
