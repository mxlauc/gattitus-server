<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatResource;
use App\Models\Cat;
use Illuminate\Http\Request;

class ShowMyCatsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return CatResource::collection(Cat::with('image')->get());
    }
}
