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
                            <h1>Edit Kategori Obat</h1>
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
                            <form action="/dashboard/category/{{ $category->id }}" method="post">
                                @method('patch')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_name">Nama Kategori Obat</label>
                                            <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" placeholder="Nama Obat" name="category_name" value="{{ old('category_name', $category->category_name) }}">
                                            @error('category_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.col -->
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="category_slug">Slug</label>--}}
{{--                                            <input type="text" class="form-control @error('category_slug') is-invalid @enderror" id="category_slug" placeholder="Slug" name="category_slug" value="{{ old('category_slug', $category->category_slug) }}">--}}
{{--                                            @error('category_slug')--}}
{{--                                            <div class="invalid-feedback">--}}
{{--                                                {{ $message }}--}}
{{--                                            </div>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
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

            const category_name = document.querySelector('#category_name');
            const category_slug = document.querySelector('#category_slug');

            category_name.addEventListener('change', function () {
                fetch('/dashboard/category/checkSlug?category_name=' + category_name.value)
                    .then(response => response.json())
                    .then(data => category_slug.value = data.category_slug)
            });

        </script>


        @include('partials.footer')
    </div>
    <!-- ./wrapper -->

@endsection



