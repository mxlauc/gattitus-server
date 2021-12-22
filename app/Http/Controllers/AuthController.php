<?php

namespace App\Http\Controllers;

use App\CustomFirebaseUploader;
use App\CustomImageModifier;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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
            $user_picture_url = "https://graph.facebook.com/v3.3/{$user_social->id}/picture?width=1000&height=1000&access_token={$user_social->token}";
            $customFirebaseUploader = new CustomFirebaseUploader();

            $result = $customFirebaseUploader->upload($user_picture_url, $user_social->id);

            $customImageModifier = new CustomImageModifier($user_picture_url);
            $colors = $customImageModifier->getTwoColors();

            $image = Image::create([
                'directory' => $result['directory'],
                'url_xl' => $result['url_xl'],
                'url_lg' => $result['url_lg'],
                'url_md' => $result['url_md'],
                'url_sm' => $result['url_sm'],
                'url_xs' => $result['url_xs'],
                'meta_data' => json_encode([
                        'aspect_ratio' => $customImageModifier->getAspectRatio(),
                        'color_bl' => $colors['color_bl'],
                        'color_tr' => $colors['color_tr'],
                    ]),
                'user_id' => null
            ]);

            

            
            
            
            $user = new User();
            $user->name = $user_social->getName();
            $user->email = $user_social->getEmail();
            $user->image_id = $image->id;
            $user->facebook_id = $user_social->getId();
            $user->role_id = 1;
            $user->username = null;
            $user->save();

            $image->user_id = $user->id;
            $image->save();
        }
        //Cookie::queue('login_token_to_firebase', $user_social->token, 10);
        Cookie::queue('login_token_to_firebase',
                $user_social->token,
                10,
                null,
                null,
                null,
                false);
        return $this->login($user);
    }

    public function login($user){
        Auth::login($user);
        return redirect(env('SPA_URL', '') . '/#');
    }

    public function logout(){
        Auth::guard('web')->logout();
    }

}
