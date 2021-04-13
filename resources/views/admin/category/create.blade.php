@extends('layouts.backend.app')

@section('title','course')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action=" {{ isset($course) ? route('admin.category.update',$course->id) : route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($course))
                @method('PUT')
            @endif
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{ isset($course) ? 'Edit' : 'Create New' }}
                            </h2>
                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label  style="text-align: center;" class="form-label">Course Name</label>
                                    <input type="text" id="title" class="form-control" name="name" value="{{$course->name ?? ''}}">

                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="course_free" value="{{$course->course_free ?? ''}}">
                                    <label class="form-label">Course Free</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">Featured Image</label>
                                <input type="file" name="picture" >
                                @if(isset($course))
                                <img src="{{asset('uploads/picture/'.$course->picture)}}" style=" margin:3px;width: 100px; height: 50px;" alt="Girl in a jacket">
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="checkbox" id="publish" class="filled-in" name="status" value="1" @if(isset($course)){{ $course->status == true ? 'checked' : '' }}@endif>
                                <label for="publish">Publish</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Teacher Name
                            </h2>
                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('user_id') ? 'focused error' : '' }}">
                                    <label for="category">Select Teacher</label>
                                    <select name="user_id" id="user_id" class="form-control show-tick" data-live-search="true" >
                                        @foreach($users as $user)
                                            @if($user->role_id==5)
                                                <option value="{{ $user->id }}">
                                                    @isset($course)
                                                        {{ $user->role->id == $course->id ? 'selected' : '' }}
                                                    @endisset
                                                    {{ $user->name }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.category.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Course Details
                            </h2>
                        </div>


                        <div class="body">
                            <textarea  style="height: 250px;" class="form-control"  name="body" id="body" >{{$course->body ?? ''}}</textarea>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
        });
    </script>

@endpush
