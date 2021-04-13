@extends('layouts.backend.app')

@section('title','Course')

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
                          Edit COURSE
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $category->name }}">
                                    <label class="form-label"></label>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong class="text-danger font-bold">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Featured Image</label>
                                <input type="file" name="picture">
                            </div>
                            <div class="form-group form-float">
                                <div class="form-group">
                                    <input type="checkbox" id="publish" class="filled-in" name="status" value="1" {{ $category->status== true ? 'checked' : '' }}>
                                    <label for="publish">Publish</label>
                                </div>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback">
                                        <strong class="text-danger font-bold">{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.category.index') }}">BACK</a>
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
