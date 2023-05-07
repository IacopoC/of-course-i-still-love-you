@extends('layouts.app')

@section('title')
    Home - Of Course I still love you
@endsection

@section('content')
    <div class="container">
        <div class="p-5 mb-4 bg-dark rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold text-white">Welcome to Of Course I Still Love you</h1>
                <p class="col-md-8 fs-4 text-white">A messages web application to write love text to the world, register now or login and start writing your messages.</p>
                <button class="btn btn-primary btn-lg" type="button"><a class="text-white text-decoration-none" href="{{ route('register') }}">Register now</a></button>
                <button class="btn btn-secondary btn-lg" type="button"><a class="text-white text-decoration-none" href="{{ route('login') }}">Login</a></button>
            </div>
        </div>
        <div class="row">
        @isset($messages)
                <div class="pt-4">
                    <p class="text-white text-uppercase"><strong>last messages:</strong></p>
                </div>
            @foreach ($messages as $message)
                <div class="col-md-4">
                <div class="pt-4">
                    <div class="card bg-dark">
                        <div class="card-header">
                            <span class="text-white">{{ $message->user->name }} - {{ $message->created_at->format('j M Y, g:i a') }} </span>
                        </div>
                        <div class="card-body">
                            {!! $message->message !!}
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
        @endisset
        </div>
    </div>
@endsection
