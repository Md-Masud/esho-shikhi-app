@extends('layouts.frontend.app')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')
    <div style="border-style: groove;" class="container">
        <div class="row">
            <div  style=" margin-left:500px;">
                <form action="{{ route('user.enroll.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <label style="text-align: center;">ENROLL KEY</label>
                    <input  type="hidden" class="form-control " id="" placeholder="ENROLL KEY" name="category_id" value="{{$course->id}}"><br>
                <input  type="password" class="form-control @error('enroll_key') is-invalid @enderror " id="email" placeholder="ENROLL KEY" name="enroll_key"><br>
                    @error('enroll_key')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>

    </div>


@endsection

@push('js')

@endpush
