@extends('layouts.main')

@section('content')

        @include('partials.navbar')

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
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
            </div>

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header">
{{--                                    <a href="/dashboard/product/create" class="btn btn-outline-primary">Tambah</a>--}}

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


                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Obat</th>
                                            <th style="width: 20%">Nama Obat</th>
                                            <th>Kategori Obat</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Kadaluarsa</th>
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
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <script>
            $(document).ready(function () {
                $('#myTable').DataTable();
            });
        </script>


        @include('partials.footer')
    <!-- ./wrapper -->

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection



