<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <!-- MAIN CSS-->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/main.css')}}">
    <!--my responsive-->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}">
    <!--- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/meanmenu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/nice-select.css')}}">
    <!--- awl carousel -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('css')
</head>
<body>
<!-- Header Area -->
<div class="header-section">
 @include('layouts.frontend.partial.header')
</div>

   @yield('content')
<!--Subcribe-section start-->
<section style="width: 1200px" class="subscribe-section  ">
    <div class="container">
        <div class="subscribe text-center py-5">
            <div class="rwo py-5">
                <div class="col-12 ">
                    <h2>KEEP UPDATED</h2>
                    <p>Sign up for our newletter to recevie updates an exlusive offers</p>
                </div>
                <div class="col-12 ">
                    <div class="input-group w-50  mx-auto pt-4">
                        <form action="{{ route('subscriber.store') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                        <input type="email" placeholder="Enter Your Email"    name="email" aria-label="Recipient's "
                               aria-describedby="my-addon">
                            <button type="submit" class="btn btn-primary">
                            SUBSCRIBE
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Subcribe-section End-->
<!--Brand-section start-->
<div class="brand-section">
    <div class="container ">
        <div class="row">
            <div class="brand-active owl-carousel ">
                <div class="single-brand"><a href=""><img src="img/brand/brand1.jpg" alt="" class=""></a></div>
                <div class="single-brand"><a href=""><img src="img/brand/brand1.jpg" alt="" class=""></a></div>
                <div class="single-brand"><a href=""><img src="img/brand/brand1.jpg" alt="" class=""></a></div>
                <div class="single-brand"><a href=""><img src="img/brand/brand1.jpg" alt="" class=""></a></div>
                <div class="single-brand"><a href=""><img src="img/brand/brand1.jpg" alt="" class=""></a></div>
            </div>
        </div>
    </div>
</div>
<!--Brand-section End-->
<!--Footer-section start-->
<footer>
    @include('layouts.frontend.partial.footer')
</footer>
<!--Footer-section End-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="{{asset('assets/frontend/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.meanmenu.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/slick.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.nice-select.min.js')}}"></script>

<!-- My Js-->
<script src="{{asset('assets/frontend/js/main.js')}}"></script>
<script src="{{ asset('assets/backend/js/demo.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    const toastr = require("jquery");
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script>
</body>
@stack('js')
</html>
