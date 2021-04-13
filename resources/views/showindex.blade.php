@extends('layouts.frontend.app')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12"><h3>Latest Video</h3></div>
        </div>
        @foreach($categories->posts as $post)
            @if($post->is_approved == true)

        <div class="row">

                        <div class="product-wrapper">

                            <div class="">
                                <a href="{{ route('index.show',$post->category_id) }}">

                                    <video width="1000" height="800" controls>
                                        <source src="{{asset('uploads/images/'.$post->video)}}" type="video/mp4">
                                    </video>
                                </a>
                            </div>

                            <div class="product-content text-center">
                                <h4>{{$post->title}}</h4>
                                <div class="rating">

                                </div>
                                <div class="price">
                                    <span>{{$post->view}}</span>
                                    <span>{{$post->created_at->diffForHumans()}}</span>
                                </div>
                                <div style="text-align: left;" class="body">
                                    {!! $post->body !!}
                                </div>
                            </div>
                        </div>
            @endif


                        <!--Single product End-->
                    </div>
    @endforeach
    </div>


@endsection

@push('js')

@endpush
