@extends('layouts.app')

@section('title')
    Dashboard - Of Course I still love you
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="pt-4">
                <h3 class="text-white">Welcome <strong>{{ Auth::user()->name }}</strong></h3>
            <p class="text-white pt-4">Counter messages: <strong>{{ $count_messages }}</strong></p>
            <p class="text-white">Email: {{ Auth::user()->email }}</p>
            <p class="text-white">Profile created at: {{ Auth::user()->created_at }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="image">
                <img src="{{ asset("img/achab.png") }}" class="img-fluid">
            </div>
        </div>
    </div>
</div>
@endsection
