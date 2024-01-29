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
                <div class="row">
                <div class="col-2 col-md-1">
                    <div class="pt-4">
                    <img src="data:image/svg+xml;base64,{{ base64_encode($svgCode) }}" alt="avatar" class="img-fluid">
                    </div>
                </div>
            <div class="col-10 col-md-11">
                <div class="pt-4 pb-4">
                            <p class="text-white"><strong>{{ $message->user->name }}</strong> | {{ $message->created_at->format('j M Y, g:i a') }}</p>

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
@endsection
