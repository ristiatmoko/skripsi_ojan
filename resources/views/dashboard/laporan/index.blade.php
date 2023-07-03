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
                            <h1>Laporan</h1>
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
                                            <th>Nama Obat</th>
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
                                                @elseif($now->format('Y-m-d') > $obat)
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
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
@endsection



