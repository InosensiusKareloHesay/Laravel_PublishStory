<div class="position-absolute tm-site-header">
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
                    @yield('plusHome')
                    <li class="nav-item">
                        <a class="nav-link tm-nav-link" href="/login" style="color:white;font-weight: bold;"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tm-nav-link" href="/register" style="color:white;font-weight: bold;"><i class="fas fa-user-plus"></i> Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>