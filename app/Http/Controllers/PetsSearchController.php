<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetResource;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PetsSearchController extends Controller
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

        $query = Pet::with('image', 'petType');

        foreach($q_params as $qp){
            $query->orWhere('name', 'like', '%' . $qp . '%');
            $query->orWhere('nickname', 'like', '%' . $qp . '%');
        }
        $query->orderBy('id', 'DESC');

        return PetResource::collection(
            $query->cursorPaginate(12)
        );
    }
}
