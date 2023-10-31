@extends('layouts.app')

@section('title')
    Edit - Of Course I still love you
@endsection

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="row">
                <div class="col-md-8">
                    <p class="text-white text-uppercase pt-md-5"><strong>edit message:</strong></p>
                </div>
            </div>
                <form method="post" action="{{ route('messages.update', $message) }}">
                    @csrf
                    @method('patch')
                    <textarea name="message" id="myeditorinstance" maxlength="255">{{ old('message', $message->message) }}</textarea>
                    <button type="submit" class="btn btn-light mt-2">{{ __('Edit') }}</button>
                    <div class="d-inline">
                        <a href="{{ route('messages.index') }}"><button type="button" class="btn btn-light mt-2 ms-3">Cancel</button></a>
                    </div>
                </form>
            </div>
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                @if (Auth::check() and Auth::user()->trap == 1)
                    <iframe src="https://giphy.com/embed/YJDpfht5PU5i0" width="100%" height="431" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
                @endif
            </div>
        </div>
            <div class="height-140"></div>
        </div>
    </div>
@endsection
