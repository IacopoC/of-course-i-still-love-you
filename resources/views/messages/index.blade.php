@extends('layouts.app')

@section('title')
    Messages - Of Course I still love you
@endsection

@section('content')
    <div class="container">
        <div class="mt-4">
            <div>
                <x-forms.tinymce-editor/>
            </div>
            @isset($messages)
            @foreach ($messages as $message)
                <div class="pt-4">
                    <div class="card bg-dark">
                        <div class="card-header">
                            <span class="text-white">{{ $message->user->name }} - {{ $message->created_at->format('j M Y, g:i a') }}</span>
                        </div>
                        <div class="card-body">
                            {!! $message->message !!}
                        @unless ($message->created_at->eq($message->updated_at))
                            <p class="text-white">- edited</p>
                        @endunless
                        @if ($message->user->is(auth()->user()))
                            <div class="d-inline">
                            <a href="{{ route('messages.edit', $message) }}"><button type="button" class="btn btn-light">Edit</button></a>
                            </div>
                                <form method="POST" class="d-inline" action="{{ route('messages.destroy', $message) }}">
                                @csrf
                                @method('delete')
                                <a href="{{ route('messages.destroy', $message) }}">
                                    <button type="submit" class="btn btn-light ms-3">Delete</button>
                                </a>
                                </form>
                        @endif
                        </div>
                    </div>
                </div>
            @endforeach
                @endisset
        </div>
    </div>
@endsection
