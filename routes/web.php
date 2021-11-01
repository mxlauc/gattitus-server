<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ReactionSimplePublicationController;
use App\Http\Controllers\SimplePublicationController;
use App\Http\Controllers\UserController;
use App\Http\Resources\SimplePublicationResource;
use App\Models\Image;
use App\Models\SimplePublication;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $publications =  SimplePublication::with(['image', 'user', 'myReaction'])->withCount('reactions')->orderBy('created_at', 'DESC')->get();

    return view('pages.home', compact('publications'));
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

Route::resource('images', ImageController::class)->names('images');
Route::resource('simplepublications', SimplePublicationController::class)->names('simplepublication');
Route::resource('simplepublications.reactions', ReactionSimplePublicationController::class)->shallow()->names('simplepublications.reactions');
Route::resource('cats', CatController::class)->names('cats');

Route::get('/@{user:username}', [UserController::class, 'show'])->name('user.show');