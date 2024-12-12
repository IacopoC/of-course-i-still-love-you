@extends('layouts.app')

@section('title')
    Edit Updown - Of Course I still love you
@endsection

@section('description')
    Edit an updown message, make it perfect and readable.
@endsection

@section('content')
    <div class="container">
        <div class="mt-4">
            <p class="text-white text-uppercase pt-md-5 fw-bold">edit updown message:</p>
            <p>Updown text field has 155 characters limit</p>
            <form method="post" action="{{ route('updowns.update', $updown) }}">
                @csrf
                @method('patch')
                <div class="input-group mb-4 mt-4">
                    <input type="text" class="form-control w-75" name="updown_message" aria-label="Text input with dropdown button" value="{{ old('updown', $updown->updown_message) }}" maxlength="155" required>
                    <select class="form-select" aria-label="Default select example" name="updown" required>
                        <option value="Up">Up</option>
                        <option value="Down">Down</option>
                    </select>
                    <button type="submit" class="btn btn-secondary">{{ __('Edit') }}</button>
                </div>
            </form>
            <div>
                <a href="{{ route('updowns.index') }}"><button type="button" class="btn btn-secondary mt-2">Cancel</button></a>
            </div>
        </div>
    </div>
@endsection
