@extends('layouts.frontend.app')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')
    <div class="bg-primary">
    <h1 style="text-align: center">COURSE DETAILS</h1>
    <h1 style="text-align: center">{{$course->name}}</h1>
    <div style="border-style: groove;" class="container">
        <div  class="row bg-white">
    <div style="border-style: groove;" class="col-sm-8">
        <p>
            {{$course->body}}
        </p>
    </div><br>
   <div class="col-sm-4">
       <h3 style="text-align: center;" ><a class="bg-primary text-white"  href="{{route('user.enroll',$course->id)}}">LOGIN ENROLL</a></h3>
       <div class="card">
           <div class="card-body">

               <h5 >COURSE FREE  ${{$course->course_free}}</h5>
               <hr>
               <h5 >COURSE TYPE ONELINE </h5>
               <hr>
               <h5 >TOTAL VIDEO  ${{$course->course_free}}</h5>
               <hr>
               <h5 >INSTRUCTOR DETAILS</h5>
               <hr>
               <h5>{{$course->user->name}}</h5>
               <p>{{$course->user->about}}</p>

               </div>
           </div>
       </div>
   </div>
        </div>

    </div><br>

    </div>

@endsection

@push('js')

@endpush
