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
                            <h1>Daftar Obat</h1>
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

{{--                                    <form action="/product" class="form-inline my-2 my-lg-0 float-lg-right mb-3">--}}
{{--                                        <input class="form-control mr-sm-2" type="search" placeholder="Search"--}}
{{--                                               aria-label="Search" name="search" value="{{ request('search') }}">--}}
{{--                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
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
                                            <th>ID Obat</th>
                                            <th style="width: 20%">Nama Obat</th>
                                            <th>Kategori Obat</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Kadaluarsa</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $product['unique_id'] }}</td>
                                                <td>{{ $product['product_name'] }}</td>
                                                <td>{{ $product->category->category_name}}</td>
{{--                                                <td>{{ $product->category->category_name ?? '' }}</td> <!-- digunakan jika kondisi  null -->--}}
                                                <td>{{ $product['product_stock'] }}</td>

                                                @php
                                                    $now = \Carbon\Carbon::now();
                                                    $obat = \Carbon\Carbon::parse($product->expired_date)->format('Y-m-d');
                                                    $different = $now->diffInDays($obat);
                                                @endphp

                                                @if($different <= 7 AND $different > 0 AND $now->format('Y-m-d') < $obat)
                                                    <td class="bg-warning text-white text-center">{{ $product->expired_date }}</td>
                                                @elseif($now->format('Y-m-d') >= $obat)
                                                    <td class="bg-danger text-white text-center">{{ $product->expired_date }}</td>
                                                @else
                                                    <td class="bg-success text-white text-center">{{ $product->expired_date }}</td>
                                                @endif

                                                <td>
                                                    <a href="/dashboard/product/{{ $product->id }}/edit" class="btn btn-outline-info">Ubah</a>
{{--                                                    <a href="/dashboard/product/delete/{{ $product->id }}" class="btn btn-outline-danger" onclick="return confirm('are you sure?')">Hapus</a>--}}
                                                    <form action="/dashboard/product/{{ $product->id }}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-outline-danger" onclick="return confirm('are you sure?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                        <hr>
                                    <h6>Keterangan: </h6>
                                        <button type="button" class="btn btn-danger">Expired</button>
                                        <button type="button" class="btn btn-warning">Hampir Expired</button>
                                        <button type="button" class="btn btn-success">Masih Bisa Digunakan</button>
{{--                                    <div class="d-flex justify-content-sm-start mt-2">--}}
{{--                                        {{ $products->links() }}--}}
{{--                                    </div>--}}
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

        @include('partials.footer')
    </div>
    <!-- ./wrapper -->

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection



