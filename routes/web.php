<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
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

Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/admin/{path}', function () {
    return view('admin.index');
})->where('path', '.*');
Route::get('/landing', function(){
    return view('welcome');
});

Route::get('/auth/login/facebook', [AuthController::class, 'loginFacebook'])->name("login.facebook");
Route::get('/auth/callback/facebook', [AuthController::class, 'callbackFacebook']);


/*
Route::get('/v8', function (){
    $v8 = new V8Js();
    $renderer_source = file_get_contents(public_path('js/admin/server.js'));
    $js = 'var process = { env: { VUE_ENV: "server", NODE_ENV: "production" } };
        this.global = { process: process };';
    $v8->executeString($js);
    
    return $v8->executeString($renderer_source);
});

 */
Route::get('{path}', function (){
    return view('index');
})->where('path', '.*');