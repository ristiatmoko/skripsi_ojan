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
                            <h1>Tambah Obat</h1>
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
                            <form action="/dashboard/product" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
{{--                                    <div class="form-group">--}}
{{--                                        <label>Kode Obat</label>--}}
{{--                                        <input type="password" disabled="disabled"  class="form-control @error('username') is-invalid @enderror" id="password" placeholder="Password" name="password" required>--}}
{{--                                    </div>--}}
                                    <div class="form-group">
                                        <label for="product_name">Nama Obat</label>
                                        <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" placeholder="Nama Obat" name="product_name" value="{{ old('product_name') }}">
                                        @error('product_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label for="product_slug">Slug</label>--}}
{{--                                        <input type="text" class="form-control @error('product_slug') is-invalid @enderror" id="product_slug" placeholder="Slug" name="product_slug" value="{{ old('product_slug') }}"  readonly>--}}
{{--                                        @error('product_slug')--}}
{{--                                        <div class="invalid-feedback">--}}
{{--                                            {{ $message }}--}}
{{--                                        </div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
                                    <div class="form-group">
                                        <label for="category">Kategori Obat</label>
                                        <select class="form-control select2" style="width: 100%;" name="category_id">
                                            @foreach($categories as $category)
                                                @if(old('category_id') == $category->id)
                                                    <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
{{--                                    <div class="form-group">--}}
{{--                                        <label for="product_stock">Stok Obat</label>--}}
{{--                                        <input type="number" class="form-control @error('product_stock') is-invalid @enderror" id="product_stock" placeholder="Stock" name="product_stock" value="{{ old('product_stock') }}">--}}
{{--                                        @error('product_stock')--}}
{{--                                        <div class="invalid-feedback">--}}
{{--                                            {{ $message }}--}}
{{--                                        </div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
                                    <div class="form-group">
                                        <label for="expired_date">Tanggal Kedaluwarsa </label>
                                        <input type="date" class="form-control @error('expired_date') is-invalid @enderror" id="expired_date" placeholder="Stock" name="expired_date" value="{{ old('expired_date') }}">
                                        @error('expired_date')
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
                                    <button type="submit" class="btn btn-primary">Tambah</button>
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



