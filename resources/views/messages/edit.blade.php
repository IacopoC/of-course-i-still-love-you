@extends('layouts.app')

@section('title')
    Edit - Of Course I still love you
@endsection

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="height-140"></div>
            <div>
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
            <div class="height-140"></div>
        </div>
    </div>
@endsection
