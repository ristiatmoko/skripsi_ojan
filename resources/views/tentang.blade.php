@extends('layouts.main')

@section('content')

        @include('partials.navbar')

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tentang</h1>
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
                                    <p class="text-justify">Kabupaten Temanggung memiliki 25 Puskesmas salah satunya yaitu Puskesmas Rejosari. Puskesmas Rejosari terletak di Dusun Krajan 3 RT 09 RW 4, Desa Rejosari, Kecamatan Pringsurat, Kabupaten Temanggung, tepatnya di Jalan Raya Magelang-Semarang KM 19,7 Rejosari Pringsurat Temanggung. Puskesmas Rejosari didirikan pada Tahun 2016 dan telah diresmikan pada tanggal 11 Januari 2017 dengan wilayah kerja meliputi tujuh Desa yaitu Desa Pringsurat, Desa Kebumen, Desa Soropadan, Desa Kupen, Desa Karangwuni, Desa Gowak, dan Desa Rejosari. Jenis pelayanan yang terdapat di Puskesmas Rejosari meliputi, pemeriksaan umum, KIA&KB, pemeriksaan gigi dan mulut, konsultasi gizi, persalinan, imunisasi, kegawatdaruratan, dan laboratorium.</p>
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



