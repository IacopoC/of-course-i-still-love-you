@extends('layouts.app')

@section('title')
    Updowns - Of Course I still love you
@endsection

@section('description')
    Write your short updown messages, read all your messages in the list.
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-white text-uppercase pt-md-5 fw-bold">updown messages:</p>
                <form method="post" action="{{ route('updowns.store') }}" class="mb-5">
                    @csrf
                <div class="input-group mb-4 mt-4">
                    <input type="text" class="form-control" name="updown_message" aria-label="Text input with dropdown button" placeholder="Write here your short texts..." maxlength="155" required>
                    <select class="form-select" aria-label="Default select example" name="updown" required>
                        <option value="Up">Up</option>
                        <option value="Down">Down</option>
                    </select>
                    <button type="submit" class="btn btn-secondary">{{ __('Create') }}</button>
                </div>
                </form>
                @foreach($updowns as $updown)
                    <div class="mt-4">
                    <form method="post" action="{{ route('updowns.destroy', $updown) }}">
                        @csrf
                        @method('delete')
                        <p class="text-white">{{ $updown->updown_message }} <span class="fw-bolder @if($updown->updown == 'Up') {{ 'text-success' }} @else {{ 'text-warning' }} @endif">{{ $updown->updown }}</span> | {{ $updown->created_at->format('j M Y, H:i') }}
                            <button type="submit" class="btn btn-danger ms-4">Delete</button>
                        </p>
                    </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
