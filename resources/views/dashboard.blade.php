@extends('layouts.app')

@section('title')
    Dashboard - Of Course I still love you
@endsection

@section('description')
    Dashboard where you can see the data of a user and other specific content about a profile.
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="text-uppercase fw-bold">Welcome {{ Auth::user()->name }} to your dashboard:</p>
            @if($count_messages < 1)
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2">You haven't written any Message yet, write your first Message...</h6>
                            <a href="{{ route('messages.index') }}" class="card-link">Create Message</a>
                        </div>
                    </div>
            @endif
            @if($count_updowns < 1)
                    <div class="card mt-4">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2">You haven't written any Updowns yet, write your first Updown...</h6>
                            <a href="{{ route('updowns.index') }}" class="card-link">Create Updown</a>
                        </div>
                    </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="pt-4">
            <p>Counter Messages: <strong>{{ $count_messages }}</strong></p>
            <p>Counter Updowns: <strong>{{ $count_updowns }}</strong></p>
            <p class="pt-4">Username: {{ Auth::user()->name }}</p>
            <p>Email: {{ Auth::user()->email }}</p>
            <p>Profile created at: {{ Auth::user()->created_at }}</p>
            <p class="pt-4 fw-bold">Switch mode:</p>
            </div>
            <form method="post" action="{{ route('dashboard') }}">
                @csrf
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="trapMode1" name="trap">
                    <label class="form-check-label" for="trapMode1">It's a Trap!</label>
                </div>
                <button type="submit" class="btn btn-secondary mt-2">{{ __('Save') }}</button>
            </form>
            </div>
            <div class="col-md-6">
                    <div class="pt-5 text-center">
                        <img src="data:image/svg+xml;base64,{{ base64_encode($svgCode) }}" alt="avatar" class="img-fluid w-25">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            @if(Auth::user()->trap == 1)
                    <iframe class="mt-5 giphy-embed" src="https://giphy.com/embed/Z1LYiyIPhnG9O" width="100%" height="600" allowFullScreen></iframe>
            @endif
        </div>
    </div>
<script>
    const trapMode1Checkbox = document.querySelector('#trapMode1');
    trapMode1Checkbox.addEventListener('change', () => {
        localStorage.setItem('trapMode1', trapMode1Checkbox.checked);
    });
    const trapMode1Enabled = localStorage.getItem('trapMode1') === 'true';
    trapMode1Checkbox.checked = trapMode1Enabled;
</script>
@endsection
