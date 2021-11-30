@extends('layouts.main')

@section('content')

<user-header-component username="{{$user->username}}"></user-header-component>
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
        <div class="card shadow-sm" style="max-height: 400px; overflow-y: auto;">
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
