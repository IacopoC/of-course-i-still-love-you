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
                    <div class="col-md-1">
                        <div class="pt-4">
                        <img src="data:image/svg+xml;base64,{{ base64_encode($svgCode) }}" alt="avatar" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-11">
                        <div class="pt-4">
                            <div class="card bg-dark">
                                <div class="card-header">
                                    <span class="text-white">{{ $message->user->name }} - {{ $message->created_at->format('j M Y, g:i a') }} </span>
                                </div>
                                <div class="card-body">
                                    {!! $message->message !!}
                                    <hr>
                                    @if(!empty($message->location))<p class="text-white"> Where you are: {{ $message->location }} </p>@endif
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
    </div>
@endsection
