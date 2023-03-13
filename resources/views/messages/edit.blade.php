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
                    <textarea name="message" class="form-control" id="textareaMessage">{{ old('message', $message->message) }}</textarea>
                    <button type="submit" class="btn btn-dark mt-2">Edit</button>
                    <a href="{{ route('messages.index') }}"><p>Cancel</p></a>
                </form>
            </div>
        </div>
    </div>
@endsection
