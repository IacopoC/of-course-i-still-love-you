@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Homepage</h1>
         <div class="mt-4">
            <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
         </div>
    </div>
@endsection
