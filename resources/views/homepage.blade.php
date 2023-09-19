@extends('layouts.app')

@section('title')
    Home - Of Course I still love you
@endsection

@section('content')
    <div class="container">
        <div class="p-5 mb-4 bg-dark rounded-3">
            <div class="row">
            <div class="col-md-8">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold text-white">Of Course I Still Love you</h1>
                <p class="col-md-8 fs-5 text-white">A messages web application to write texts to the world, register now or login and start writing your messages.</p>
                <button class="btn btn-primary btn-lg" type="button"><a class="text-white text-decoration-none" href="{{ route('register') }}">Register now</a></button>
                <button class="btn btn-secondary btn-lg" type="button"><a class="text-white text-decoration-none" href="{{ route('login') }}">Login</a></button>
            </div>
            </div>
            <div class="col-md-4">
            <div id="circle-orbit-container">
                <div id="inner-orbit">
                    <div class="inner-orbit-cirlces"></div>
                </div>
                <div id="middle-orbit">
                    <div class="middle-orbit-cirlces"></div>
                </div>
                <div id="outer-orbit">
                    <div class="outer-orbit-cirlces"></div>
                </div>
            </div>
            </div>
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
                            <hr>
                            <p class="text-white">Where you are: {{ $message->location }}</p>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
                <div class="text-end">
                    <p class="text-white text-uppercase"><a href="/messages-list"><strong>see all messages</strong></a></p>
                </div>
        @endisset
        </div>
    </div>
@endsection
