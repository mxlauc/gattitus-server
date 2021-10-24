<?php

namespace App\Http\Controllers;

use App\CustomFirebaseUploader;
use App\CustomImageModifier;
use Illuminate\Http\Request;
use App\Models\Image as ModelsImage;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->authorize('create', ModelsImage::class);
        if(!Auth::user()){
            return [
                'estado' => 'error',
                'url' => null
            ];
        }
        $customFirebaseUploader = new CustomFirebaseUploader();

        $result = $customFirebaseUploader->upload($request->file('file')->getRealPath());

        $customImageModifier = new CustomImageModifier($request->file('file')->getRealPath());
        $colors = $customImageModifier->getTwoColors();

        $image = ModelsImage::create([
            'directory' => $result['directory'],
            'url_xl' => $result['url_xl'],
            'url_lg' => $result['url_lg'],
            'url_md' => $result['url_md'],
            'url_sm' => $result['url_sm'],
            'url_xs' => $result['url_xs'],
            'meta_data' => json_encode([
                    'aspect_ratio' => $customImageModifier->getAspectRatio(),
                    'color_bl' => $colors['color_bl'],
                    'color_tr' => $colors['color_tr'],
                ]),
            'user_id' => Auth::user()->id
        ]);
    
        return [
            "estado" => "ok",
            "imageId" => $image->id,
            "url" => $result['url_lg'],
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
