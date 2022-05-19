<?php

use App\Http\Controllers\admin\PunishmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostReactionController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReactionTypeController;
use App\Http\Controllers\UserPetController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\ReportTypeController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\ReportedPostController;
use App\Http\Controllers\CommentReactionController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShowMyPetsController;
use App\Http\Resources\UserResource;
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


Route::post('auth/logout', [AuthController::class, 'logout']);

Route::apiResource('posts', PostController::class);
Route::apiResource('images', ImageController::class);
Route::apiResource('posts.comments', PostCommentController::class)->shallow()->names('posts.comments');
Route::apiResource('comments.reactions', CommentReactionController::class)->shallow();
Route::apiResource('posts.reactions', PostReactionController::class)->shallow();
Route::apiResource('users.pets', UserPetController::class)->shallow()->only(['index']);
Route::get('pets/mine', ShowMyPetsController::class);
Route::apiResource('pets', PetController::class);
Route::apiResource('reaction_types', ReactionTypeController::class);
Route::apiResource('followers', FollowersController::class);

Route::get('/users', [UserController::class, 'index']);
Route::get('/@{user:username}', [UserController::class, 'show']);
Route::get('user', function(Request $request){
    if($request->user()){
        return new UserResource(User::with('image', 'myFollow')->find($request->user() ? $request->user()->id : -1) ?? null);
    }else{
        return null;
    }
    
});

Route::apiResource('pages', PageController::class);

Route::prefix('admin')->group(function () {
    Route::apiResource('/users', UsersController::class);
    Route::get('/reports/posts', ReportedPostController::class); // averiguar por que esta linea no funciona si va despues de las siguientes dos lineas
    Route::apiResource('/reports/types', ReportTypeController::class);
    Route::apiResource('/reports', ReportController::class);
    Route::apiResource('/punishments', PunishmentController::class);
});    
