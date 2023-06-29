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
                            <h1>Edit Admin</h1>
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
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            {{--                            <h3 class="card-title">Select2 (Default Theme)</h3>--}}

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                {{--                                <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
                                {{--                                    <i class="fas fa-times"></i>--}}
                                {{--                                </button>--}}
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="/dashboard/user/{{ $user->id }}" method="post">
                                @method('patch')
                                @csrf
                                {{--                            @method('PUT')--}}
                                <div class="row">
                                    <div class="col-md-6">
                                        {{--                                    <div class="form-group">--}}
                                        {{--                                        <label>Kode Obat</label>--}}
                                        {{--                                        <input type="password" disabled="disabled"  class="form-control @error('username') is-invalid @enderror" id="password" placeholder="Password" name="password" required>--}}
                                        {{--                                    </div>--}}
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" name="name" required value="{{ old('name', $user->name) }}">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('username') is-invalid @enderror" id="email" placeholder="Email" name="email" required value="{{ old('email', $user->email) }}">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password"> Password </label>
                                            <input type="password" class="form-control @error('username') is-invalid @enderror" id="password" placeholder="Password" name="password" required >
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </form>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                            the plugin.
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <script>
            // $(document).ready(function () {
            //     $('#myTable').DataTable();
            // });
            //
            const product_name = document.querySelector('#product_name');
            const product_slug = document.querySelector('#product_slug');

            product_name.addEventListener('change', function () {
                fetch('/dashboard/product/checkSlug?product_name=' + product_name.value)
                    .then(response => response.json())
                    .then(data => product_slug.value = data.product_slug)
            });

            {{--$('#product_name').change(function(e) {--}}
            {{--    $.get('{{ url('check_slug') }}',--}}
            {{--        { 'product_name': $(this).val() },--}}
            {{--        function( data ) {--}}
            {{--            $('#product_slug').val(data.product_slug);--}}
            {{--        }--}}
            {{--    );--}}
            {{--});--}}

        </script>


        @include('partials.footer')
    </div>
    <!-- ./wrapper -->

@endsection



