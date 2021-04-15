<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }}</div>
        <div class="email"> {{ Auth::user()->email}}</div>
        <div class="image">
            {{--            <img src="{{ Storage::disk('public')->url('profile/'.Auth::user()->image) }}" width="48" height="48" alt="User" />--}}
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
            <div class="email"></div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">

                    <li>
                        {{--                        <a href="{{ Auth::user()->role->id == 1 ? route('admin.settings') : route('author.settings')}}"><i class="material-icons">settings</i>Settings</a>--}}
                    </li>

                    <li role="seperator" class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="">
                <a href="{{ route('index') }}">
                    <i class="material-icons">dashboard</i>
                    <span>Home</span>
                </a>
            </li>
            @if(Request::is('admin*'))
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
                    <a href="{{ route('admin.roles.index') }}">
                        <i class="material-icons">label</i>
                        <span>Roles</span>
                    </a>
                </li
                <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="material-icons">label</i>
                        <span>Users</span>
                    </a>
                </li
                <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.index') }}">
                        <i class="material-icons">label</i>
                        <span>Course</span>
                    </a>
                </li
                <li class="{{ Request::is('admin/courseEnroll*') ? 'active' : '' }}">
                    <a href="{{ route('admin.courseEnroll.index') }}">
                        <i class="material-icons">label</i>
                        <span>CourseEnroll</span>
                    </a>
                </li
            @elseif(Request::is('teacher*'))
                <li class="{{ Request::is('teacher/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('teacher.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('teacher/post*') ? 'active' : '' }}">
                    <a href="{{ route('teacher.post.index') }}">
                        <i class="material-icons">label</i>
                        <span>Post</span>
                    </a>
                </li
            @else
                <li class="{{ Request::is('user/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('user/course') ? 'active' : '' }}">
                    <a href="{{ route('user.my.course') }}">
                        <i class="material-icons">label</i>
                        <span>My Course</span>
                    </a>
                </li
            @endif
            <li class="">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="material-icons">dashboard</i>
                    <span>Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        {{--        <div class="copyright">--}}
        {{--            &copy; 2017 - {{ date("Y") }} All rights reserved. <br>--}}
        {{--            <strong> Developed &amp; <i class="far fa-heart"></i> by </strong>--}}
        {{--                        <a href="https://www.youtube.com/channel/UCwbVAlvrsD2Tpx93bleNbOA" target="_blank">Programming kit</a>.--}}
        {{--        </div>--}}

    </div>
    <!-- #Footer -->
</aside>
