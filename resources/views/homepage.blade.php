@extends('layouts.app')

@section('title')
    Home - Of Course I still love you
@endsection

@section('description')
    Welcome to Of Course I Still Love You, a website to write private text messages, register now or login and start writing your messages.
@endsection

@section('content')
    <div class="container">
        <div class="py-5 mb-4 bg-dark rounded-3">
            <div class="row">
            <div class="col-md-8">
            <div class="container-fluid py-5">
                        <h1 class="display-5 fw-bold text-white">Of Course I Still Love you</h1>
                        <p class="col-md-8 fs-5 text-white">A website to write private text messages, register now or login and start writing.</p>
                @guest
                    <button class="btn btn-primary btn-lg mt-2" type="button"><a class="text-white text-decoration-none" href="{{ route('register') }}">Register now</a></button>
                    <button class="btn btn-secondary btn-lg mt-2" type="button"><a class="text-white text-decoration-none" href="{{ route('login') }}">Login</a></button>
                @else
                    <button class="btn btn-primary btn-lg mt-2" type="button"><a class="text-white text-decoration-none" href="{{ route('updowns.index') }}">Create Updowns</a></button>
                    <button class="btn btn-secondary btn-lg mt-2" type="button"><a class="text-white text-decoration-none" href="{{ route('messages.index') }}">Create Messages</a></button>
                @endguest
            </div>
            </div>
                <div class="col-md-4">
                    <img src="{{ asset('img/logo-of-course.png') }}" class="img-fluid rounded-circle" alt="logo">
                </div>
                </div>
            </div>
        </div>
@endsection
