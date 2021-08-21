<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

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
    return view('welcome');
});

Route::get('/auth/login/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name("login.facebook");


Route::get('/auth/callback/facebook', function () {
    $user_social = Socialite::driver('facebook')->user();

    $user = User::where('facebook_id', $user_social->getId())->first();

    //$user_social->token,

    if(!$user){
        $url_imagen = "https://graph.facebook.com/v3.3/{$user_social->id}/picture?type=small&access_token={$user_social->token}";
        $fileContents = file_get_contents($url_imagen);
        //File::put(public_path() . '/storage/usuarios_imagen/' . $user->getId() . ".jpg", $fileContents);
        $path_image = $user_social->getId() . "_" . round(microtime(true) * 1000) . "_" . rand(30000, 60000) . ".jpg";
        Storage::put($path_image, $fileContents);
        $user = User::create([
            'name'          => $user_social->getName(),
            'email'         => $user_social->getEmail(),
            'avatar'        => $path_image,
            'facebook_id'   => $user_social->getId(),
        ]);
    }

    loginAndRedirect($user);
});

function loginAndRedirect($user){
    Auth::login($user);
    return redirect("/");
}
