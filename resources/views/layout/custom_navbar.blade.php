<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
    <div class="container px-4">
        @guest
        <a class="navbar-brand" href="{{ route('homepage') }}">Online Learning System</a>
        @else
        <a class="navbar-brand" href="{{ route('course.view') }}">Dashboard</a>
        @endguest
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                    </li>
                @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fa-solid fa-user mr-2"></i>
                            <span class="badge badge-warning navbar-badge"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{route('profile')}}">
                                <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item text-danger" href="{{ route('signout') }}">
                                <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                </ul>
                @endguest
            </ul>
        </div>
    </div>
</nav>
