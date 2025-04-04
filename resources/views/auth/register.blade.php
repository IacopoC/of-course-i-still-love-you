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
            <img class="mb-4 rounded-circle" src="{{ asset('img/logo-of-course-p.png') }}" alt="logo">
            <h1 class="h3 mb-3 fw-normal">Please register</h1>

            <div class="form-floating">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required id="floatingInputNameRegister" placeholder="Insert your name">
                <label for="floatingInputNameRegister">Name</label>
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required id="floatingInputEmailRegister" placeholder="name@example.com">
                <label for="floatingInputEmailRegister">Email address</label>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required id="floatingPasswordRegister" placeholder="Password">
                <label for="floatingPasswordRegister">Password</label>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required id="floatingPasswordConfirmRegister" placeholder="Confirm password">
                <label for="floatingPasswordConfirmRegister">Confirm Password</label>
            </div>
            <div class="my-3"></div>
            <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
            @if (Route::has('login'))
                <div class="py-4">
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Already have an account?') }}
                    </a>
                </div>
            @endif
        </form>
    </div>
@endsection
