<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersDiscoverController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $q = User::with("image", 'myFollow')
                    ->withCount('pets');
        if($request->user()){
            $q->where('id', '!=', $request->user()->id)
            ->whereDoesntHave('followers', function($query) use ($request){
                $query->where('follower_id', $request->user()->id);
            });
        }
                    
        $q->inRandomOrder()
        ->limit(5);

        return UserResource::collection(
            $q->get()
        );
    }
}
