@extends('templates.userLayout')
@section('title', 'UMKM - Login')
@section('content')
    <div class="container">
        <!-- Modal login-->
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Sign In</h5>
                    </div>
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                      </div>
                    @endif
                    <form action="/auth/login" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 p-2">
                                    <div class="mb-3">
                                        <input type="text" name="email" id="email" class="form-control mb-2 @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="email" autocomplete="off" autofocus>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <p>Tidak memiliki Akun ? <a href="/register" class="text-decoration-none">daftar</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="buttonLogin" class="btn btn-outline-primary btn-sm">Login</button>
                            <a href="/" type="button" class="btn btn-outline-danger btn-sm">Cancle</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
