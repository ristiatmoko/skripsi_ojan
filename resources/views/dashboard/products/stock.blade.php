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
                            <h1>Stock Obat Keluar</h1>
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
                            <form action="{{ route('product.reduce-stock', ['product' => $product->id]) }}" method="post">
                            @method('post')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
{{--                                    <div class="form-group">--}}
{{--                                        <label>Kode Obat</label>--}}
{{--                                        <input type="password" disabled="disabled"  class="form-control @error('username') is-invalid @enderror" id="password" placeholder="Password" name="password" required>--}}
{{--                                    </div>--}}
                                    <div class="form-group">
                                        <label for="unique_id">ID Obat</label>
                                        <input type="text" disabled class="form-control @error('unique_id') is-invalid @enderror" id="unique_id" placeholder="Nama Obat" name="unique_id" value="{{ old('unique_id', $product->unique_id  ) }}">
                                        @error('unique_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Nama Obat</label>
                                        <input type="text" disabled class="form-control @error('product_name') is-invalid @enderror" id="product_name" placeholder="Nama Obat" name="product_name" value="{{ old('product_name', $product->product_name  ) }}">
                                        @error('product_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stock">Obat Keluar</label>
                                        <input type="number"
                                               min="1" m    ax="10000000"
                                               class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Stock" name="stock" value="{{ old('stock', 1) }}">
                                        @error('stock')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Keterangan</label>
{{--                                        <select class="form-control select2" style="width: 100%;" name="category_id">--}}
{{--                                            <option selected>Obat Keluar</option>--}}
{{--                                            <option value="1">Obat Masuk</option>--}}
                                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Keterangan" name="description" value="{{ old('description') }}">
                                        @error('description')
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
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            <!-- /.row -->
                            </form>

                        </div>
                        <!-- /.card-body -->
{{--                        <div class="card-footer">--}}
{{--                            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about--}}
{{--                            the plugin.--}}
{{--                        </div>--}}
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
            // const product_name = document.querySelector('#product_name');
            // const product_slug = document.querySelector('#product_slug');
            //
            // product_name.addEventListener('change', function () {
            //     fetch('/dashboard/product/checkSlug?product_name=' + product_name.value)
            //         .then(response => response.json())
            //         .then(data => product_slug.value = data.product_slug)
            // });

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



