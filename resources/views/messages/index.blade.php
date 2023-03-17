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
                    <button type="submit" class="btn btn-light mt-2">{{ __('Create') }}</button>
                </form>
            </div>
            @isset($messages)
            @foreach ($messages as $message)
                <div class="pt-4">
                    <div class="card bg-dark">
                        <div class="card-header">
                            <span class="text-white">{{ $message->user->name }} - {{ $message->created_at->format('j M Y, g:i a') }}</span>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-white">{{ $message->message }}</p>
                        </div>
                        @unless ($message->created_at->eq($message->updated_at))
                            <p class="ps-3 text-white">edited</p>
                        @endunless
                        @if ($message->user->is(auth()->user()))
                            <div class="card-body">
                            <a href="{{ route('messages.edit', $message) }}"><button type="button" class="btn btn-light mt-2">Edit</button></a>
                            </div>
                            <form method="POST" action="{{ route('messages.destroy', $message) }}">
                                @csrf
                                @method('delete')
                                <a href="{{ route('messages.destroy', $message) }}"><button type="submit" class="btn btn-light mt-2 ms-3 mb-3">Delete</button></a>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
                @endisset
        </div>
    </div>
@endsection
