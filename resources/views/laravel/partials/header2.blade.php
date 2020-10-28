<div class="position-relative">
    <div class="potition-absolute tm-site-header">
        <div class="container-fluid position-relative">
            <nav class="navbar navbar-expand-lg mr-0 ml-auto" id="tm-main-nav">
                <button class="navbar-toggler tm-bg-black py-2 px-3 mr-0 ml-auto collapsed" type="button" data-toggle="collapse" data-target="#navbar-nav" aria-controls="navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span>
                        <i class="fas fa-bars tm-menu-closed-icon"></i>
                        <i class="fas fa-times tm-menu-opened-icon"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                    <ul class="navbar-nav text-uppercase">
                        <li class="nav-item">
                            <a class="nav-link tm-nav-link" href="/cerita" style="color:white;font-weight: bold;">Explore</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tm-nav-link" href="/cerita/create" style="color:white;font-weight: bold;">Write</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link tm-nav-link" style="color:white;font-weight: bold;" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tm-nav-link" style="color:white;font-weight: bold;" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link tm-nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;font-weight: bold;">
                                {{Auth::user()->pena}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" style="font-weight: bold;" href="/profil">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    @yield('header-img')
    <!-- {{-- Diisi <div class="tm-welcome-container tm-fixed-header tm-fixed-header-[angkaHeader]"></div> --}} -->
    <div class="tm-welcome-container text-center text-white">
        <div class="tm-welcome-container-inner">
            <img class="card-img-top mt-5" src="{{asset('/img/logooo.png')}}" style="height:70%; width: 40%;">
        </div>
    </div>
    <!-- Header image -->
    <div id="tm-fixed-header-bg"></div>
</div>