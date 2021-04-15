@extends('layouts.backend.app')

@section('title','Post')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form role="form" id="userFrom" method="POST"
              action="{{ isset($user) ? route('admin.users.update',$user->id) : route('admin.users.store') }}"
              enctype="multipart/form-data">
            @csrf
            @if (isset($user))
                @method('PUT')
            @endif
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD NEW USER
                            </h2>
                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="name"
                                           value="{{ $user->name ?? ''  }}">
                                    <label class="form-label">Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" id="title" class="form-control" name="email"
                                           value="{{ $user->email ?? ''  }}">
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" id="title" class="form-control" name="password"
                                           >
                                    <label class="form-label">Password</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" id="title" class="form-control" name="password_confirmation"
                                    >
                                    <label class="form-label">Confirm Password</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Role
                            </h2>
                        </div>
                        <div class="body">
                                <div class="form-line {{ $errors->has('role') ? 'focused error' : '' }}">
                                    <label for="Role">Select Role</label>
                                    <select name="role" id="role" class="form-control show-tick" data-live-search="true" >
                                        @foreach($roles as $key=>$role)
                                            <option value="{{ $role->id }}"
                                            @isset($user)

                                                    {{ $user->role->id == $role->id ? 'selected' : '' }}

                                            @endisset>
                                                {{ $role->name}}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ isset($user)? route('admin.dashboard'): route('admin.user.index')}}">BACK</a>
                        <button type="submit" class="btn btn-primary">
                            @if(isset($user))
                                {{ __('Update User') }}
                            @else
                                {{ __('Create User') }}
                            @endif
                        </button>

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
