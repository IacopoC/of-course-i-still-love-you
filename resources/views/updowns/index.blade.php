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
                <form method="post" action="">
                    @csrf
                <div class="input-group mb-3 mt-4">
                    <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Write here your short texts..." maxlength="155">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Do you feel up or down?</button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Up</a></li>
                        <li><a class="dropdown-item" href="#">Down</a></li>
                    </ul>
                    <button type="submit" class="btn btn-outline-primary">{{ __('Create') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
