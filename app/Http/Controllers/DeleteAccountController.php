<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteAccountController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //no se depende de eventos, se elimina manualmente todo
        $user = $request->user();
        
        foreach($user->posts as $p){
            $p->simple_post->image()->delete();
            $p->reactions()->delete();
            foreach($p->comments as $pc){
                $pc->reactions()->delete();
            }
        }
        foreach($user->pets as $p){
            $p->image()->delete();
        }
        $user->posts()->delete();

        $user->followeds()->delete();
        $user->followers()->delete();

        $user->pets()->delete();
        $user->image()->delete();
        $user->name = '';
        $user->email = '';
        $user->remember_token = '';
        $user->save();

        DB::table('reactions')->where('user_id', $user->id)->delete();
        DB::table('post_comments')->where('user_id', $user->id)->delete();
        DB::table('images')->where('user_id', $user->id)->delete();

        Auth::logout();
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();
        $user->delete();
    }
}
