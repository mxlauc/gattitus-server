<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SimplePublicationController;
use App\Models\Image as ModelsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Ramsey\Uuid\Uuid;
use Intervention\Image\Facades\Image;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
function uploadFileFirebase($name, $fileStream){
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

Route::post('images/upload', function(Request $request){
    if(!Auth::user()){
        return [
            'estado' => 'error',
            'url' => null
        ];
    }
    $name = Auth::user()->facebook_id . '/' . 'images' . '/' . round(microtime(true) * 1000) . "_" . rand(30000, 60000) . ".jpg";

    $img = Image::make($request->file('file')->getRealPath());
    $limite = 1000;
    if ($img->height() > $limite || $img->width() > $limite){
        $img->resize($limite, $limite, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $fileStream = $img->stream('jpg', 85);
    }else{
        $fileStream = fopen($request->file('file')->getRealPath(), 'r');
    }
    $url = uploadFileFirebase($name, $fileStream);

    $image = ModelsImage::create([
        'private_path' => $name,
        'public_path' => $url,
        'user_id' => Auth::user()->id
    ]);

    return [
        "estado" => "ok",
        "imageId" => $image->id,
        "url" => $url,
    ];
});

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/auth/login/facebook', [AuthController::class, 'loginFacebook'])->name("login.facebook");
Route::get('/auth/callback/facebook', [AuthController::class, 'callbackFacebook']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('editor', function(){
    return view('pages.editor');
})->name('editor');

Route::get('hey.js', function(){
    return 'jeje';
});

Route::resource('simplepublication', SimplePublicationController::class)->names('simplepublication');