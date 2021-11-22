@extends('layouts.main')

@section('content')

<div class="row g-0">
    <div class="col-12 col-md-8">
        <div style="max-width: 500px; margin: auto;">
            @foreach($posts as $post)
            <simple-post-component
                :post='{
                    id: {{$post->id}},
                    color: 321,
                    image: {
                        "url" : "{{$post->image->url_lg}}",
                        "aspect_ratio" : {{json_decode($post->image->meta_data)->aspect_ratio}},
                        "color_bl" : "{{json_decode($post->image->meta_data)->color_bl}}",
                        "color_tr" : "{{json_decode($post->image->meta_data)->color_tr}}"
                    },
                    description : `{{$post->description}}`,
                    user : {
                        url : "{{$post->user->getUrl()}}",
                        name : "{{$post->user->name}}",
                        avatar : "{{$post->user->image->url_xs}}",
                    },
                    reactions_count : {{$post->reactions_count}},
                    myReaction: {!! $post->my_reaction ?? "null" !!}
                }'
            ></simple-post-component>
            
            @endforeach
            
        </div>
    </div>
    <div class="col-12 col-md-4 sticky-top" style="max-width: 400px; max-width: 100%; align-self: flex-start; top: 80px;">
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
