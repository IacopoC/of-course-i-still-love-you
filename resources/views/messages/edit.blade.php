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
                    <label for="myeditorinstance"></label>
                    <textarea name="message" id="myeditorinstance" maxlength="255">{{ old('message', $message->message) }}</textarea>
                    <button type="submit" class="btn btn-secondary mt-2">{{ __('Edit') }}</button>
                    <div class="d-inline">
                        <a href="{{ route('messages.index') }}"><button type="button" class="btn btn-dark mt-2 ms-3">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
@endsection
