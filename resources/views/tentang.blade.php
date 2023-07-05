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
                                    <p class="text-justify">Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed odio operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc posthac, sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras mattis iudicium purus sit amet fermentum.</p>
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



