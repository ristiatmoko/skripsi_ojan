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
                            <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                                @if(session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if(session()->has('loginError'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('loginError') }}
                                    </div>
                                @endif
                                <form action="/login" method="post">
                                    @csrf
                                    <div class="form-floating">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" required autofocus value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                    </div>
                                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                                    <small>Not register? <a href="/register">Register Now</a></small>
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
