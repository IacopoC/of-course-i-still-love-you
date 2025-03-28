@extends('layouts.app')

@section('title')
    Login - Of Course I still love you
@endsection

@section('description')
   Login to see your dashboard and write and read all messages and updowns.
@endsection

@section('content')
    <div class="form-signin w-100 m-auto">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <img class="mb-4 rounded-circle" src="{{ asset('img/logo-of-course-p.png') }}" alt="logo">
            <h1 class="h3 my-3 fw-normal">Please login</h1>
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                @error('email')
                <div class="py-2 invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" required autocomplete="current-password">
                <label for="floatingPassword">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
            @if (Route::has('password.request'))
                <div class="py-4">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                </div>
            @endif
        </form>
    </div>
@endsection
