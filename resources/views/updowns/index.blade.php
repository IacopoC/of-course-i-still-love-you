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
                <p class="text-white text-uppercase pt-md-5 fw-bold">create updown message:</p>
                <form method="post" action="{{ route('updowns.store') }}" class="mb-5">
                    @csrf
                <div class="input-group mb-4 mt-4">
                    <input type="text" class="form-control w-75" name="updown_message" aria-label="Text input with dropdown button" placeholder="Write here your short text..." maxlength="155" required>
                    <select class="form-select" aria-label="Default select example" name="updown" required>
                        <option value="Up">Up</option>
                        <option value="Down">Down</option>
                    </select>
                    <button type="submit" class="btn btn-secondary">{{ __('Create') }}</button>
                </div>
                </form>
                @isset($updowns)
                @foreach($updowns as $updown)
                    <div class="my-4">
                    <form method="post" action="{{ route('updowns.destroy', $updown) }}">
                        @csrf
                        @method('delete')
                        <div class="row">
                        <div class="col-2 col-md-1">
                            <div class="pt-2">
                                <img src="data:image/svg+xml;base64,{{ base64_encode($svgCode) }}" alt="avatar" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-10 col-md-11">
                            <p><strong>{{ $updown->user->name }}</strong> | {{ $updown->created_at->format('j M Y, H:i') }}</p>
                        <p>{{ $updown->updown_message }}</p>
                         <hr>
                        <div class="alert @if($updown->updown == 'Up') {{'alert-success'}} @else {{'alert-warning'}} @endif" role="alert">
                            This is a <strong>{{ $updown->updown }}</strong> message!
                        </div>
                            <div class="d-inline">
                                <a href="{{ route('updowns.edit', $updown) }}"><button type="button" class="btn btn-secondary">Edit</button></a>
                            </div>
                            <div class="d-inline">
                            <button type="submit" class="btn btn-danger ms-3">Delete</button>
                            </div>
                        </div>
                        </div>
                    </form>
                    </div>
                @endforeach
                    <div class="d-flex pt-4">
                        {!! $updowns->links() !!}
                    </div>
                    @endisset
            </div>
        </div>
    </div>
@endsection
