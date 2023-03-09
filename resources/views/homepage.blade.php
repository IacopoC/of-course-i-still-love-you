@extends('layouts.app')

@section('title')
    Home - Of Course I still love you
@endsection

@section('content')
    <div class="container">
        <h1>Homepage</h1>
        @isset($messages)
            @foreach ($messages as $message)
                <div class="pt-4">
                    <div class="card">
                        <div class="card-header">
                            {{ $message->user->name }} - {{ $message->created_at->format('j M Y, g:i a') }}
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $message->message }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
         <div class="mt-4">
            <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
         </div>
    </div>
@endsection
