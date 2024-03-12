@extends('layouts.app')

@section('title')
    Updown - Of Course I still love you
@endsection

@section('description')
    Write your short updown messages, read all your messages in the list.
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-white text-uppercase pt-md-5 fw-bold">updown messages:</p>
                <form method="post" action="{{ route('updowns.store') }}">
                    @csrf
                <div class="input-group mb-3 mt-4">
                    <input type="text" class="form-control" name="updown_message" aria-label="Text input with dropdown button" placeholder="Write here your short texts..." maxlength="155" required>
                    <select class="form-select" aria-label="Default select example" name="updown" required>
                        <option value="up">Up</option>
                        <option value="down">Down</option>
                    </select>
                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                </div>
                </form>
                @foreach($updowns as $updown)
                    <p class="text-white">{{ $updown->updown_message }} - {{ $updown->updown }}</p>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
