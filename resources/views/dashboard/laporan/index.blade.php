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

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->
                            <div class="card">



                                <div class="card-body">
                                    <h3>Laporan Obat Masuk dan Keluar</h3>
                                    <hr>

                                    <form class="mb-2" method="get" action="/dashboard/laporan">
                                        <div class="input-group">
                                            <select class="form-select" aria-label="Default select example" name="date_filter">
                                                <option value="">Semua Hari</option>
                                                <option value="today" @if(request('date_filter') === 'today') selected @endif>Hari Ini</option>
                                                <option  value="yesterday" @if(request('date_filter') === 'yesterday') selected @endif>Kemarin</option>
                                                <option  value="this-week" @if(request('date_filter') === 'this-week') selected @endif>Minggu Ini</option>
                                                <option  value="this-month" @if(request('date_filter') === 'this-month') selected @endif>Bulan Ini</option>
                                                <option  value="this-year" @if(request('date_filter') === 'this-year') selected @endif>Tahun Ini</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </div>
                                    </form>

                                    @if(session()->has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <table>
                                        <table id="records" class="table table-bordered table-striped">

                                        <thead>

                                        <tr>
                                            <th>No</th>
                                            <th>ID Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Keterangan</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($stocks as $stock)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $stock->product->unique_id}}</td>
                                                <td>{{ $stock->product->product_name}}</td>
                                                <td>{{ $stock->description }} </td>
{{--                                                <td>{{ $stock->product->product_stock}}</td>--}}
                                                <td>{{ $stock->amount}}</td>
{{--                                                <td>{{ $stock->amount }}</td>--}}
                                                <td>{{ $stock->created_at->format('Y-m-d') }}</td>
{{--                                                @php--}}
{{--                                                    $now = \Carbon\Carbon::now();--}}
{{--                                                    $obat = \Carbon\Carbon::parse($product->expired_date)->format('Y-m-d');--}}
{{--                                                    $different = $now->diffInDays($obat);--}}
{{--                                                @endphp--}}

{{--                                                @if($different <= 30 AND $different >= 0 AND $now->format('Y-m-d') < $obat)--}}
{{--                                                    <td class="bg-warning text-white text-center">{{ $product->expired_date }}</td>--}}
{{--                                                @elseif($now->format('Y-m-d') > $obat)--}}
{{--                                                    <td class="bg-danger text-white text-center">{{ $product->expired_date }}</td>--}}
{{--                                                @else--}}
{{--                                                    <td class="bg-success text-white text-center">{{ $product->expired_date }}</td>--}}
{{--                                                @endif--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            <div class="card">



                                <div class="card-body">
                                <h3>Laporan Obat </h3>
                                    <hr>


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
                                                <td>{{ $product->unique_id }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->category->category_name ?? '' }}</td> <!-- digunakan jika kondisi  null -->
                                                <td>{{ $product->product_stock }}</td>
                                                @php
                                                    $now = \Carbon\Carbon::now();
                                                    $obat = \Carbon\Carbon::parse($product->expired_date)->format('Y-m-d');
                                                    $different = $now->diffInDays($obat);
                                                @endphp

                                                @if($different <= 30 AND $different >= 0 AND $now->format('Y-m-d') < $obat)
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
                                    <button type="button" class="btn btn-danger">Kedaluwarsa</button>
                                    <button type="button" class="btn btn-warning">Mendekati Kedaluwarsa</button>
                                    <button type="button" class="btn btn-success">Masih Bisa Digunakan</button>
                                </div>
                                <!-- /.card-body -->
                            </div>


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
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            // $('#records').DataTable({
            //     dom: 'Bfrtip',
            //     buttons: ['copy', 'excel', 'pdf', 'print']
            // });

            $('#records').DataTable({
                // dom: 'Bfrtip',
                // "buttons": ['copy', 'excel', 'pdf', 'print'],
                "dom": 'Bfrtip',
                "paging": true,
                "autoWidth": true,
                "columnDefs": [{
                    "visible": true,
                    "targets": -1
                }],
                buttons: [{
                    extend: 'print',
                    // extend: 'excel',
                    autoPrint: true,
                    title: '',

                    //For repeating heading.
                    repeatingHead: {
                        logo: 'https://seeklogo.com/images/P/puskesmas-logo-D5EA09221D-seeklogo.com.png',
                        logoPosition: 'center',
                        logoStyle: 'max-width:50px',
                        title: '<h3 class="text-center">SIPOT Puskesmas Rejosari</h3> <br> <h4>Tanda Tangan:</h4>'
                    },

                }]
            });
        });

        function fetch(star_date, end_date) {
            $.ajax({
                url: "{{ route('product/stocks') }}",
                type: "GET",
                date: {
                    start_date: star_date,
                    end_date: end_date
                },
                dataType: "json",
                success: function (data) {
                    // datatable
                    var i = 1;
                    $('#records').DataTable({
                        "data": data.stocks,
                        // responsive
                        "responsive": true,
                        "columns": [{
                            "data": "id",
                            "render": function (data, type, row, meta) {
                                return i++;
                            }
                        },
                            {
                                "data": "name"
                            },
                            {
                                "data": "standard",
                                "render": function (data, type, row, meta) {
                                    return '${row.standard}th Standard';
                                }
                            },
                            {

                            }

                        ]
                    })
                }
            });
        }

    </script>
@endsection



