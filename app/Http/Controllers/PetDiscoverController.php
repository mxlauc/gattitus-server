<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetResource;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetDiscoverController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return PetResource::collection(
            Pet::with('image', 'petType')
                    ->where('user_id', '!=', $request->user() ? $request->user()->id : null)
                    ->inRandomOrder()
                    ->limit(6)
                    ->get()
        );
    }
}
