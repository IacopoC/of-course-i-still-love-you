@extends('layouts.app')

@section('title')
    Edit - Of Course I still love you
@endsection

@section('content')
    <div class="container">
        <div class="mt-4">
            <div>
                <form method="POST" action="{{ route('messages.update', $message) }}">
                    <label for="textareaMessage" class="form-label">Message</label>
                    @csrf
                    @method('patch')
                    <textarea name="message" class="form-control" id="textareaMessage" rows="3" maxlength="255">{{ old('message', $message->message) }}</textarea>
                    <div class="d-inline">
                    <button type="submit" class="btn btn-light mt-2">Edit</button>
                    </div>
                    <div class="d-inline">
                    <a href="{{ route('messages.index') }}"><button type="button" class="btn btn-light mt-2 ms-3">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
