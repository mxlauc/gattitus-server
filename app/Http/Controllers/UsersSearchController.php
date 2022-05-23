<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersSearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $q_params = Str::of(preg_replace('/\s+/', ' ', trim($request->query('q'))))->explode(' ');

        $query = User::with("image", 'myFollow')
                    ->withCount('pets');

        foreach($q_params as $qp){
            $query->orWhere('name', 'like', '%' . $qp . '%');
        }
        $query->orderBy('id', 'DESC');
        

        return UserResource::collection(
            $query->cursorPaginate(12)
        );
    }
}
