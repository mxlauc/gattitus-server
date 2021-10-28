@extends('layouts.main')

@section('content')

<div class="row g-0">
    <div class="col-12 col-md-7">
        <div style="max-width: 440px; margin: auto;">
            @foreach($publications as $publication)
            <simple-publication-component
                :publication="{
                    color: 321,
                    image: {
                        'url' : '{{$publication->image->url_lg}}',
                        'aspect_ratio' : {{json_decode($publication->image->meta_data)->aspect_ratio}},
                        'color_bl' : '{{json_decode($publication->image->meta_data)->color_bl}}',
                        'color_tr' : '{{json_decode($publication->image->meta_data)->color_tr}}'
                    },
                    description : `{{$publication->description}}`,
                    user : {
                        url : '{{$publication->user->getUrl()}}',
                        name : '{{$publication->user->name}}',
                        avatar : '{{$publication->user->image->url_xs}}',
                    }
                }"
            ></simple-publication-component>
            
            @endforeach
            
        </div>
    </div>
    <div class="col-12 col-md-5 sticky-top" style="max-width: 400px; max-width: 100%; align-self: flex-start; top: 80px;">
        <div class="card shadow-sm mb-3" >

            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the
                    bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card shadow-sm mb-3" >

            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the
                    bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card shadow-sm mb-3" >

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
