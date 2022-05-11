<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetResource;
use App\Models\Pet;
use App\Models\PetType;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PetResource::collection(Pet::with('image', 'petType')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->tryCreatePet($request);

        return [
            "estado" => 'ok'
        ];
    }

    function tryCreatePet(Request $request, $try = 0){
        $result = false;
        try{
            $result = Pet::create([
                'name' => $request->name,
                'nickname' => $request->nickname,
                'user_id' => $request->user()->id,
                'image_id' => $request->image_id,
                'slug' => Str::lower(Str::random(13)),
                'pet_type_id' => PetType::first()->id,
            ]);
        }
        catch(Exception $e){
            if($try < 20){
                 $result = $this->tryCreatePet($request, $try + 1);
            }
        }
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  String $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return new PetResource(Pet::with('image', 'user.image', 'user.myFollow')->where('slug',$slug)->get()->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
