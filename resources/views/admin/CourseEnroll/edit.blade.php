@extends('layouts.backend.app')

@section('title','Category')

@push('css')
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ADD NEW CourseEnroll
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.courseEnroll.update',$courseEnroll->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{$courseEnroll->password}}" name="password">
                                    <label class="form-label">Password</label>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong class="text-danger font-bold">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                                    <label for="category">Select Category</label>
                                    <select name="category_id" id="category" class="form-control show-tick" data-live-search="true" >
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }} {{ $courseEnroll->id == $category->id ? 'selected' : '' }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.courseEnroll.index') }}">BACK</a>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

@endpush
