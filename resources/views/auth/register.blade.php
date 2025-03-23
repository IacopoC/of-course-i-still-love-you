@extends('layouts.app')

@section('title')
    Register - Of Course I still love you
@endsection

@section('description')
    Register to write and read your messages and updowns.
@endsection

@section('content')
    <div class="form-signin w-100 m-auto">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please register</h1>

            <div class="form-floating">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required id="floatingInput" placeholder="Insert your name">
                <label for="floatingInput">Name</label>
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required id="floatingPassword" placeholder="Confirm password">
                <label for="floatingPassword">Confirm Password</label>
            </div>
            <div class="my-3"></div>
            <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
        </form>
    </div>
@endsection
