<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostReactionController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\UserController;
use App\Http\Resources\PostCommentCollection;
use App\Http\Resources\PostResource;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostComment;
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
    $posts =  Post::with(['simple_post.image', 'user', 'myReaction'])->withCount('reactions')->orderBy('created_at', 'DESC')->get();

    return view('pages.home', compact('posts'));
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
Route::resource('posts', PostController::class)->names('post');
Route::resource('posts.comments', PostCommentController::class)->shallow()->names('post.comments');
Route::resource('posts.reactions', PostReactionController::class)->shallow()->names('posts.reactions');
Route::resource('cats', CatController::class)->names('cats');

Route::get('/@{user:username}', [UserController::class, 'show'])->name('user.show');

Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/admin/{path}', function () {
    return view('admin.index');
})->where('path', '.*');


Route::resource('reactions', ReactionController::class)->names('reactions');
Route::resource('followers', FollowersController::class)->names('followers');

Route::get('/landing', function(){
    return view('welcome');
});

Route::get('/v8', function (){
    $v8 = new V8Js();
    $renderer_source = file_get_contents(public_path('js/admin/server.js'));
    $js = 'var process = { env: { VUE_ENV: "server", NODE_ENV: "production" } };
        this.global = { process: process };';
    $v8->executeString($js);
    
    return $v8->executeString($renderer_source);
});