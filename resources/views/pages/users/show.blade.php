@extends('layouts.main')

@section('content')
<div class="card shadow">
    <div class="card-body p-4">
        <div class="row gy-3">
            <div class="col-12 col-sm-3 col-md-2 text-center">
                <img src="{{Storage::url($user->avatar)}}" class="img-fluid shadow w-100" style="max-width: 160px; border-radius: 20%;">
            </div>
            <div class="col-12 col-sm-9 col-md-10 text-center text-sm-start">
                <h1 class="mb-0" style="font-weight: 900">{{$user->name}}</h1>
                <h6>{{'@' . $user->username}}</h6>
                <span class="d-block">Se unio el 3 de Septiembre del 2021</span>
                <span class="d-block">activo hace 3 horas</span>
                <button class="btn btn-sm btn-primary mt-2">Seguir</button>
            </div>    
        </div>    
    </div>
</div>
<div class="row mt-4">
    <div class="col text-center">
        <div style="max-width: 460px; margin: auto;">
            <div class="card shadow mb-4" style="height: 500px">
                
            </div>
            <div class="card shadow mb-4" style="height: 500px">
                
            </div>
            <div class="card shadow mb-4" style="height: 500px">
                
            </div>
            <div class="card shadow mb-4" style="height: 500px">
                
            </div>
            <div class="card shadow mb-4" style="height: 500px">
                
            </div>
            <div class="card shadow mb-4" style="height: 500px">
                
            </div>
            
        </div>
    </div>
    <div class="col-5">
        <div class="card shadow" style="height: 400px;">
            
        </div>
    </div>
    
</div>

@endsection
