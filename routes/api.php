<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostReactionController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\UserController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->group(function () {
    
    Route::resource('images', ImageController::class)->names('images');
    Route::resource('posts.comments', PostCommentController::class)->shallow()->names('post.comments');
    Route::resource('posts.reactions', PostReactionController::class)->shallow()->names('posts.reactions');
    Route::resource('cats', CatController::class)->names('cats');
    Route::get('/@{user:username}', [UserController::class, 'show'])->name('user.show');
    Route::resource('reactions', ReactionController::class)->names('reactions');
    Route::resource('followers', FollowersController::class)->names('followers');
    Route::get('user', function(Request $request){
        return User::with('image', 'myFollow')->find($request->user()->id);
    });
    Route::apiResource('posts', PostController::class)->names('post');
});
