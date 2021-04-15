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
                            @foreach($myCourse as $course)
                            <div style="border-style: groove;margin: 30px; " class="col-md-3">

                                <div  class="body">
                                    <a href="{{route('user.course.view',$course->category->id)}}"><img src="{{asset('uploads/picture/'.$course->category->picture)}}" style="width: 200px; height: 150px;" alt="Girl in a jacket">
                                    </a><br>
                                </div>
                                <h6>{{$course->category->name}}</h6>
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
