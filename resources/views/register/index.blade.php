@extends('layouts.main')

@section('content')

    @include('partials.navbar')


    <section class="content-wrapper">
        <div class="content-header">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary">
                         <main class="form-signin">
                            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                            <form action="/register" method="post">
                                @csrf
                                <div class="form-floating">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" name="name" required value="{{ old('name') }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" required value="{{ old('username') }}">
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('username') is-invalid @enderror" id="email" placeholder="Email" name="email" required value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('username') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                                <small>Already register? <a href="/login">Login Now</a></small>
                            </form>
                        </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('partials.footer')
@endsection
