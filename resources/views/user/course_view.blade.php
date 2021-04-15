@extends('layouts.backend.app')

@section('title','post')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <span>Add New vide</span>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ALL MY COURSE
                            {{--                            <span class="badge bg-blue">{{ $posts->count() }}</span>--}}
                        </h2>
                    </div>

                    <div class="row clearfix">
                        @foreach($course->posts as $post)
                            <div style="border-style: groove;margin:20px; " class="col-md-4">

                                <div  class="body">
                                    <video style="margin: 5px;" width="200" height="150"  controls>
                                        <source src="{{asset('uploads/images/'.$post->video)}}" type="video/mp4">
                                    </video>
                                    <h4>{{$post->title}}</h4>
                                    <span>{{$post->created_at->diffForHumans()}}</span>
                                    <p>{!!Illuminate\Support\Str::limit( $post->body ,300) !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div><br>



                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>

@endsection

@push('js')

@endpush
