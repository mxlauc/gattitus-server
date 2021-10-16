<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image as ModelsImage;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use Intervention\Image\Facades\Image;

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
        if(!Auth::user()){
            return [
                'estado' => 'error',
                'url' => null
            ];
        }
        $name = 'gattitus/' . Auth::user()->facebook_id . '/' . 'images' . '/' . round(microtime(true) * 1000) . "_" . rand(30000, 60000) . ".jpg";
    
        $img = Image::make($request->file('file')->getRealPath());
        $limite = 1000;
        $w = $img->width();
        $h = $img->height();
        if ($h > $limite || $w > $limite){
            $img->resize($limite, $limite, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $fileStream = $img->stream('jpg', 85);
        }else{
            $fileStream = fopen($request->file('file')->getRealPath(), 'r');
        }
        $url = $this->uploadFileFirebase($name, $fileStream);
    
        // resize image to fixed size
        $img->resize(90, 90);
        $img->pixelate(30);
        $img->brightness(20);
        $color1 = $img->pickColor(10, 80, 'hex');
        $color2 = $img->pickColor(80, 10, 'hex');

        $image = ModelsImage::create([
            'private_path' => $name,
            'public_path' => $url,
            'meta_data' => json_encode([
                    'aspect_ratio' => round($w / $h, 2),
                    'color_bl' => $color1,
                    'color_tr' => $color2,
                ]),
            'user_id' => Auth::user()->id
        ]);
    
        return [
            "estado" => "ok",
            "imageId" => $image->id,
            "url" => $url,
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

    private function uploadFileFirebase($name, $fileStream){
        $bucket = app('firebase.storage')->getBucket();
        $uuid = Uuid::uuid4()->toString();
    
        $bucket->upload($fileStream, [
            'name' => $name,
            'metadata' => [
                'metadata' => [
                    'firebaseStorageDownloadTokens' => $uuid
                ]
            ]
        ]);
        $name_formated = str_replace('/', '%2F', $name);
        return "https://firebasestorage.googleapis.com/v0/b/{$bucket->name()}/o/{$name_formated}?alt=media&token={$uuid}";
    }
}
