@extends('layouts.app')

@section('title')
    Dashboard - Of Course I still love you
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <p class="text-white">Welcome <strong>{{ Auth::user()->name }}</strong></p>
            <p class="text-white">Profile created at: {{ Auth::user()->created_at }}</p>
        </div>
    </div>
</div>
@endsection
