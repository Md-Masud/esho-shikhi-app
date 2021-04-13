@extends('layouts.frontend.app')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12"><h3>Course</h3></div>
        </div>

        <div class=" row">
            @foreach($courses as $course)
                @if($course->status== true)

                    <div class="col-md-3">
                        <div style="background: #FFF;border-style: groove;">
                            <div  class="">
                                <div style="background: #FFF;border-style: groove;">
                                <a href="{{ route('index.show',$course->id) }}"><img src="{{asset('uploads/picture/'.$course->picture)}}" style="width: 246px; height: 150px;" alt="Girl in a jacket">
                                </a>
                            </div>
                                <br>
                                <h4 style=" background-color: #fff; margin: 5px;" >{{$course->name }}</h4>
                                <p style=" background-color: #fff;margin: 5px;" >{{ Illuminate\Support\Str::limit($course->body ,100)}}</p>
                                <h3 style="color: red; border-style: groove;margin: 5px; text-align: center;" >
                                    ${{$course->course_free}}</h3>
                                <a   href="{{route('course.view',$course->id)}}"><button  class="btn-success" style="margin-left:60px; margin-bottom: 5px;">details</button></a>
                            </div>
                        </div>
                        <!--Single product End-->
                    </div>
    @endif

    @endforeach

@endsection

@push('js')

@endpush
