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
use App\Http\Controllers\UserCatController;
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

    Route::post('auth/logout', [AuthController::class, 'logout']);

    Route::apiResource('posts', PostController::class);
    Route::apiResource('images', ImageController::class);
    Route::apiResource('posts.comments', PostCommentController::class)->shallow();
    Route::apiResource('posts.reactions', PostReactionController::class)->shallow();
    Route::apiResource('users.cats', UserCatController::class)->shallow()->only(['index']);
    Route::apiResource('cats', CatController::class);
    Route::apiResource('reactions', ReactionController::class);
    Route::apiResource('followers', FollowersController::class);

    Route::get('/@{user:username}', [UserController::class, 'show']);
    Route::get('user', function(Request $request){
        return User::with('image', 'myFollow')->find($request->user()->id);
    });
});
