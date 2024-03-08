@extends('layouts.app')

@section('title')
    Messages - Of Course I still love you
@endsection

@section('description')
    The list of all messages written by every user of the web application. Read them all.
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @isset($messages)
                <div class="pt-4">
                    <div class="row">
                    <div class="col-md-10">
                    <p class="text-white text-uppercase pt-md-5"><strong>all messages:</strong></p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-white text-uppercase pt-md-5"><strong>your votes count: {{ $votes }}</strong></p>
                    </div>
                    </div>
                </div>
                @foreach ($messages as $message)
                    <div class="col-2 col-md-1">
                        <div class="pt-4">
                        <img src="data:image/svg+xml;base64,{{ base64_encode($message->avatar_code) }}" alt="avatar" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-10 col-md-11">
                        <div class="pt-4 pb-4">
                            <p class="text-white"><strong>{{ $message->user->name }}</strong> | {{ $message->created_at->format('j M Y, H:i') }} </p>
                                    {!! $message->message !!}
                                    <hr>
                                    @if(!empty($message->location))<p class="text-white"> Where you are: {{ $message->location }} </p>@endif
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
