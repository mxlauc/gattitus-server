<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::with('cats')->findOrFail($id);
        return CatResource::collection($user->cats());
    }


}
