@extends('layouts.app')

@section('title')
    Messages - Of Course I still love you
@endsection

@section('content')
    <div class="container">
        <div class="mt-4">
            <div>
                <form method="POST" action="{{ route('messages.store') }}">
                    <label for="textareaMessage" class="form-label">Message</label>
                    @csrf
                    <textarea name="message" placeholder="{{ __('What\'s on your mind?') }}" class="form-control" id="textareaMessage">{{ old('message') }}</textarea>
                    <button type="submit" class="btn btn-dark mt-2">{{ __('Create') }}</button>
                </form>
            </div>
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
        </div>
    </div>
@endsection
