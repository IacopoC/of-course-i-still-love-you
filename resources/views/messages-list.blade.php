@extends('layouts.app')

@section('title')
    Messages - Of Course I still love you
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @isset($messages)
                <div class="pt-4">
                    <p class="text-white text-uppercase"><strong>all messages:</strong></p>
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
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
@endsection
