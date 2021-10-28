@extends('layouts.main')

@section('content')
<div class="card shadow">
    <div class="card-body p-4">
        <div class="row gy-3 gx-0">
            <div class="col-12 col-sm-3 col-md-2 text-center">
                <img src="{!!$user->image->url_md!!}" class="img-fluid shadow w-100" style="max-width: 160px; border-radius: 20%;">
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
<div class="row gy-4 gx-0 mt-0">
    <div class="col-12 col-md-7 order-2 order-md-1 text-center">
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
    <div class="col-12 col-md-5 order-1 order-md-2">
        <div class="card shadow" style="max-height: 400px; overflow-y: auto;">
            <div class="card-body p-4">
                <h1 class="pb-3 fw-bold">Mis gatos</h1>
                <div class="row gy-3">
                    @foreach ($cats as $cat)
                    <div class="col-4 col-lg-3">
                        <cat-item-component
                        name="{{$cat->name}}"
                        image="{{$cat->image->url_sm}}"
                        />
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection
