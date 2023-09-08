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
                            <h1>Daftar Admin</h1>
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
                                    <a href="/dashboard/user/create" class="btn btn-primary">Tambah</a>
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
                                            <th>Nama Admin</th>
                                            <th>Email Admin</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user['name'] }}</td>
                                                <td>{{ $user['email'] }}</td>
                                                @if($user['is_active'] == 1)
                                                    <td class="bg-success text-white text-center">{{ "Aktif" }}</td>
                                                @else
                                                    <td class="bg-danger text-white text-center">{{ "Tidak Aktif" }}</td>
                                                @endif
                                                <td>
                                                    <a href="/dashboard/user/{{ $user->id }}/edit" class="btn btn-outline-info">Ubah</a>
{{--                                                    <form action="/dashboard/user/{{ $user->id }}" method="post" class="d-inline">--}}
{{--                                                        @method('delete')--}}
{{--                                                        @csrf--}}
{{--                                                        <button class="btn btn-outline-danger" onclick="return confirm('are you sure?')">Hapus</button>--}}
{{--                                                    </form>--}}
                                                    @if($user['is_active'] == 0)
                                                        <a href="/dashboard/user/{{ $user->id }}/active" class="btn btn-success">Aktif</a>
                                                    @else
                                                        <a href="/dashboard/user/{{ $user->id }}/nonactive" class="btn btn-danger">Tidak Aktif</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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



