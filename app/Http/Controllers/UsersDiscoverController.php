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
        return UserResource::collection(
            User::with("image", 'myFollow')
                    ->withCount('pets')
                    ->where('id', '!=', 51)
                    
                    ->whereDoesntHave('followers', function($query) use ($request){
                        $query->where('follower_id', 51);
                    })
                    ->inRandomOrder()
                    ->orderBy('id', 'DESC')
                    ->limit(5)
                    ->get()
        );
    }
}
