@extends('layouts.main')

@section('content')
@include('sections.posts_top')
<div class="row">
    <div class="col-12 col-md-7">
        <div style="max-width: 480px; margin: auto;">
            @foreach($publications as $publication)
            <simple-publication-component
                :publication="{
                    color: 321,
                    image: '{{$publication->image->public_path}}',
                    description : `{{$publication->description}}`,
                    user : {
                        url : '/home',
                        name : '{{$publication->user->name}}',
                        avatar : '/storage/{{$publication->user->avatar}}',
                    }
                }"
            ></simple-publication-component>
            
            @endforeach
            
        </div>
    </div>
    <div class="col-12 col-md-5 sticky-top" style="max-width: 400px; max-width: 100%; align-self: flex-start; top: 80px;">
        <div class="card" >

            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the
                    bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" >

            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the
                    bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" >

            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the
                    bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>

@endsection
