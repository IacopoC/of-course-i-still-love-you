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
                    <div class="card bg-dark">
                        <div class="card-header">
                            <span class="text-white">{{ $message->user->name }} - {{ $message->created_at->format('j M Y, g:i a') }} </span>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-white">{{ $message->message }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
@endsection
