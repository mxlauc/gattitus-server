<?php

namespace App\Http\Controllers;

use App\CustomFirebaseUploader;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reaction::all();
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
        $customFirebaseUploader = new CustomFirebaseUploader();
        // image_svg
        $fileStream = fopen($request->file('image_svg')->getRealPath(), 'r');
        $name = 'gattitus/' . 'imgs' . '/' . dechex(round(microtime(true) * 1000)) . "_" . Uuid::uuid4()->toString() . '.svg';
        $image_svg = $customFirebaseUploader->uploadFileFirebase($name, $fileStream);
        // image_gif
        $fileStream = fopen($request->file('image_gif')->getRealPath(), 'r');
        $name = 'gattitus/' . 'imgs' . '/' . dechex(round(microtime(true) * 1000)) . "_" . Uuid::uuid4()->toString() . '.gif';
        $image_gif = $customFirebaseUploader->uploadFileFirebase($name, $fileStream);

        Reaction::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'display_name_es' => $request->display_name_es,
            'image_svg' => $image_svg,
            'image_gif' => $image_gif,
        ]);

        return [
            'result' => 'ok'
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
