@extends('layouts.app')

@section('title')
    Messages - Of Course I still love you
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @isset($messages)
                <div class="pt-4">
                    <div class="row">
                    <div class="col-md-9">
                    <p class="text-white text-uppercase pt-md-5"><strong>all messages:</strong></p>
                    </div>
                    <div class="col-md-3">
                    </div>
                    </div>
                </div>
                @foreach ($messages as $message)
                    <div class="col-md-12">
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
                <div class="d-flex">
                  {!! $messages->links() !!}
                </div>
            @endisset
        </div>
        <div class="row">
            <div class="col-md-9">
                @if (Auth::check() and Auth::user()->trap == 1)
                <p class="text-white text-uppercase pt-md-5 ps-4"><strong>it's a trap!</strong></p>
                 @endif
            </div>
            <div class="col-md-3">
                @if (Auth::check() and Auth::user()->trap == 1)
                    <iframe src="https://giphy.com/embed/lHF5rbg9TYqDS" width="100%" height="360" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
                @endif
            </div>
        </div>
    </div>
    @if (Auth::check() and Auth::user()->trap == 1)
        <div class="tie-fighter">
            <img class="img-fluid tie-image" src="{{ asset('img/tie-fighter.png') }}">
        </div>
    @endif
    <div class="height-140"></div>
@endsection
