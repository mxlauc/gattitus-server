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

Route::post('images/upload', function(Request $request){
    $bucket = app('firebase.storage')->getBucket();
    $uuid = Uuid::uuid4()->toString();
    $name = 'img.jpg';

    $bucket->upload(fopen($request->file('file')->getRealPath(), 'r'), [
        'name' => $name,
        'metadata' => [
            'metadata' => [
                'firebaseStorageDownloadTokens' => $uuid
            ]
        ]
    ]);
    
    
    // open an image file
    $img = Image::make($request->file('file')->getRealPath());

    // now you are able to resize the instance
    $img->resize(200, 200, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    });

    // finally we save the image as a new file
    $img->save(sys_get_temp_dir() . $uuid);

    $name = 'xd' . $name;

    $bucket->upload(fopen(sys_get_temp_dir() . $uuid, 'r'), [
        'name' => $name,
        'metadata' => [
            'metadata' => [
                'firebaseStorageDownloadTokens' => $uuid
            ]
        ]
    ]);
    return [
        "estado" => "ok",
        "url" => "https://firebasestorage.googleapis.com/v0/b/{$bucket->name()}/o/{$name}?alt=media&token={$uuid}"
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