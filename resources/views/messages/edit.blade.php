@extends('layouts.app')

@section('title')
    Edit - Of Course I still love you
@endsection

@section('description')
    Edit a message, make it perfect and readable.
@endsection

@section('content')
    <div class="container">
        <div class="mt-4">
                <form method="post" action="{{ route('messages.update', $message) }}">
                    @csrf
                    @method('patch')
                    <label for="myeditorinstance" class="text-white text-uppercase pt-md-5 pb-4 fw-bold">edit message:</label>
                    <textarea name="message" id="myeditorinstance" maxlength="255">{{ old('message', $message->message) }}</textarea>
                    <button type="submit" class="btn btn-secondary mt-2">{{ __('Edit') }}</button>
                    <div class="d-inline">
                        <a href="{{ route('messages.index') }}"><button type="button" class="btn btn-dark mt-2 ms-3">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
@endsection
