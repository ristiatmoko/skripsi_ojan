<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
        <img src="{{ asset('dashboard_assets/dist/img/Logo_Puskesmas.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <h4 class="brand-text font-weight text-bold">SIPOT</h4><h4>Puskesmas Rejosari</h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dashboard_assets/dist/img/admin.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
{{--        <div class="form-inline">--}}
{{--            <div class="input-group" data-widget="sidebar-search">--}}
{{--                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <div class="input-group-append">--}}
{{--                    <button class="btn btn-sidebar">--}}
{{--                        <i class="fas fa-search fa-fw"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Home
{{--                            <span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/product" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Daftar Obat
                        </p>
                    </a>
                </li>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/category" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Kategori Obat
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/laporan" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
                @can('admin')
                <li class="nav-header">ADMIN</li>
                <li class="nav-item">
                    <a href="/dashboard/user" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Admin
                        </p>
                    </a>
                </li>
                @endcan
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link btn-danger text-white">Logout</button>
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
