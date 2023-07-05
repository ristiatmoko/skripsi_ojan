
<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="" class="navbar-brand">
            <img src="{{ asset('dashboard_assets/dist/img/Logo_Puskesmas.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 size-32" style="opacity: .8">
{{--            <span class="brand-text font-weight-light">AdminLTE 3</span>--}}
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/home" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/product" class="nav-link">Daftar Obat</a>
                </li>
                <li class="nav-item">
                    <a href="/tentang" class="nav-link">Tentang</a>
                </li>
                <li class="nav-item">
                    <a href="/kontak" class="nav-link">Kontak</a>
                </li>
{{--                <li class="nav-item dropdown">--}}
{{--                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>--}}
{{--                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">--}}
{{--                        <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                        <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
            </ul>

            <!-- SEARCH FORM -->
{{--            <form class="form-inline ml-0 ml-md-3">--}}
{{--                <div class="input-group input-group-sm">--}}
{{--                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <button class="btn btn-navbar" type="submit">--}}
{{--                            <i class="fas fa-search"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
        </div>

        <!-- Right navbar links -->
{{--        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">--}}
{{--            @auth--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ auth()->user()->name }}</a>--}}
{{--                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">--}}
{{--                        <li><a href="/dashboard " class="dropdown-item">My Dashboard </a></li>--}}
{{--                        <li>--}}
{{--                            <hr class="dropdown-divider"></li>--}}
{{--                        <li>--}}
{{--                            <form action="/logout" method="post">--}}
{{--                                @csrf--}}
{{--                                <button type="submit" class="dropdown-item">Logout</button>--}}
{{--                            </form>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            @else--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>--}}
{{--                </li>--}}
{{--            @endauth--}}
{{--        </ul>--}}
    </div>
</nav>
<!-- /.navbar -->
