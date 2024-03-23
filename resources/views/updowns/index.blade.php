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
                @isset($updowns)
                @foreach($updowns as $updown)
                    <div class="mt-4">
                    <form method="post" action="{{ route('updowns.destroy', $updown) }}">
                        @csrf
                        @method('delete')
                        <p>{{ $updown->updown_message }} | {{ $updown->created_at->format('j M Y, H:i') }}</p>
                         <hr>
                        @if($updown->updown == 'Up')
                        <div class="alert alert-success" role="alert">
                            This is a {{ $updown->updown }} message.
                        </div>
                        @else
                         <div class="alert alert-warning" role="alert">
                                This is a {{ $updown->updown }} message.
                         </div>
                        @endif
                            <button type="submit" class="btn btn-danger">Delete</button>
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
