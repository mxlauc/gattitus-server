<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserPetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::with('pets.image')->findOrFail($id);
        return PetResource::collection($user->pets);
    }


}
