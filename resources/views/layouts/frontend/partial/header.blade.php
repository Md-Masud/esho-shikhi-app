<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<div class="header-section">
    <div class="container position-relative">
        <div class="row">
            <div class="col-xl-5 col-md-12 my-xl-5 mb-0 my-sm-3  position-static ">
                <div class="main-menu d-none d-md-block">
                    <nav>
                        <u>
                            <i>
{{--                                <div class="search-box">--}}
{{--                                    <form action="#">--}}
{{--                                        <input type="text" placeholder="Search">--}}
{{--                                        <button><i class="fas fa-search"></i></button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
                            </i>
                        </u>
                        <ul>
                            <li><a href="{{url('/')}}">Home </a></li>
                            @auth()
                            @if(Auth::user()->role->id == 1)
                            <li><a href="{{route('admin.dashboard')}}"> Admin Profile</a> </li>
                            @elseif(Auth::user()->role->id == 2)
                                <li><a href="{{route('user.dashboard')}}"> UserProfile</a> </li>
                            @elseif(Auth::user()->role->id == 5)
                                <li><a href="{{route('teacher.dashboard')}}">Teacher Profile</a> </li>
                            @endif
                        @endauth
                            <li><a href="{{route('courseShow')}}">Course</a></li>
                        </ul>

                    </nav>
                </div>

            </div>
            <div class="col-xl-2 col-md-4 col-sm-12 text-center mb-0  my-xl-5 ">
                <div class="">
                    <h1 style="font-family:  sans-serif;font-size: 40px; text-shadow: 3px 3px 3px #ababab">Esho Shikki</h1>
                </div>
            </div>
            <div class="col-xl-5 col-md-8 col-sm-12 mb-0  my-xl-5 text-center text-md-right position-relative">
                <div class="header-right">

                    <ul>

                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth

                                @else
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif

                        @auth('web')
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
