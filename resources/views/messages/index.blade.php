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
            @if(count($messages) > 1)
                <div class="row">
                    <div class="col-md-9">
                        <p class="text-white text-uppercase pt-md-5"><strong>your messages:</strong></p>
                    </div>
                </div>
            @endif
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
                            <hr>
                            @if(!empty($message->location))<p class="text-white"> Where you are: {{ $message->location }} </p>@endif
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
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            @if (Auth::check() and Auth::user()->trap == 1)
                <iframe src="https://giphy.com/embed/jW1ZmcgPXcasw" width="100%" height="204" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
            @endif
        </div>
        <div class="col-md-3"></div>
    </div>
    @if (Auth::check() and Auth::user()->trap == 1)
        <div class="millenium-falcon">
            <img class="img-fluid millenium-image" src="{{ asset('img/millenium-falcon.png') }}">
        </div>
    @endif
    <div class="height-140"></div>
@endsection
