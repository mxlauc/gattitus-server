<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

    Route::post('auth/logout', [AuthController::class, 'logout'])->name('logout');

    Route::apiResource('posts', PostController::class)->names('post');
    Route::apiResource('images', ImageController::class)->names('images');
    Route::apiResource('posts.comments', PostCommentController::class)->shallow()->names('post.comments');
    Route::apiResource('posts.reactions', PostReactionController::class)->shallow()->names('posts.reactions');
    Route::apiResource('cats', CatController::class)->names('cats');
    Route::apiResource('reactions', ReactionController::class)->names('reactions');
    Route::apiResource('followers', FollowersController::class)->names('followers');

    Route::get('/@{user:username}', [UserController::class, 'show'])->name('user.show');
    Route::get('user', function(Request $request){
        return User::with('image', 'myFollow')->find($request->user()->id);
    });
});
