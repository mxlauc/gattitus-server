<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
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
    
    return "https://firebasestorage.googleapis.com/v0/b/{$bucket->name()}/o/{$name}?alt=media&token={$uuid}";
}

Route::post('images/upload', function(Request $request){
    $name = 'img.jpg';

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

    return [
        "estado" => "ok",
        "url" => $url
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