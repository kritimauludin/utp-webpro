@extends('templates.userLayout')
@section('title', 'UMKM - Registration')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10 mx-auto col-lg-5">
            <div class="p-4 p-md-5 border rounded-3 bg-light">
                <form action="/auth/register" method="POST">
                    @csrf
                    <div class="text-center h3">Register Account</div>
                    <div class="mb-3 p-2">
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control mb-2 @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" name="username" class="form-control mb-2 @error('username') is-invalid @enderror" value="{{old('username')}}" placeholder="Username">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" name="email" class="form-control mb-2 @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control mb-2 @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>            
                    <button type="submit" name="saveAccount" class="btn btn-outline-primary btn-sm">Submit</button>
                    <a href="/login" type="button" class="btn btn-outline-danger btn-sm">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection