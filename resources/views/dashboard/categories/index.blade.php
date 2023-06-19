@extends('dashboard.layouts.main')

@section('content')

    <div class="wrapper">

{{--        @include('dashboard.partials.navbar')--}}

        @include('dashboard.partials.sidebar')


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Daftar Kategori</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <a href="/dashboard/product/create" class="btn btn-primary">Tambah</a>

                                    <form action="/product" class="form-inline my-2 my-lg-0 float-lg-right mb-3">
                                        <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                               aria-label="Search" name="search" value="{{ request('search') }}">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search
                                        </button>
                                    </form>
                                    {{--                                    <button type="button" class="btn btn-outline-primary">Tambah</button>--}}
                                    {{--                                    <a href="/dashboard/product/create" class="btn btn-outline-primary">Tambah</a>--}}
                                </div>
                                <!-- /.card-header -->



                                <div class="card-body">

                                    @if(session()->has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $category['category_name'] }}</td>
                                                <td>
                                                    <a href="/dashboard/product/{{ $category->id }}/edit" class="btn btn-outline-info">Ubah</a>
{{--                                                    <a href="/dashboard/product/delete/{{ $category->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure?')">Hapus</a>--}}
                                                    <form action="/dashboard/product/{{ $category->id }}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-outline-danger" onclick="return confirm('are you sure?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-sm-start mt-2">
{{--                                        {{ $categories->links() }}--}}
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <script>
            $(document).ready(function () {
                $('#myTable').DataTable();
            });
        </script>


        @include('partials.footer')
    </div>
    <!-- ./wrapper -->

@endsection



