<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SimplePublicationController;
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

Route::resource('images', ImageController::class)->names('images');
Route::resource('simplepublications', SimplePublicationController::class)->names('simplepublication');