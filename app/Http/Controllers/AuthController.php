<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function loginFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook(){
        $user_social = Socialite::driver('facebook')->user();
        $user = User::where('facebook_id', $user_social->getId())->first();

        if(!$user){
            $url_imagen = "https://graph.facebook.com/v3.3/{$user_social->id}/picture?type=small&access_token={$user_social->token}";
            $fileContents = file_get_contents($url_imagen);
            $path_image = $user_social->getId() . "_" . round(microtime(true) * 1000) . "_" . rand(30000, 60000) . ".jpg";
            Storage::put($path_image, $fileContents);
            $user = User::create([
                'name'          => $user_social->getName(),
                'email'         => $user_social->getEmail(),
                'avatar'        => $path_image,
                'facebook_id'   => $user_social->getId(),
                'role_id'       => 1,
            ]);
        }

        return $this->login($user);
    }

    public function login($user){
        Auth::login($user);
        return redirect("/");
    }

    public function logout(){
        Auth::logout();
        return redirect("/");
    }

}
