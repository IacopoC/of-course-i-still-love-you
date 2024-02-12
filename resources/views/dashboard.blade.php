@extends('layouts.app')

@section('title')
    Dashboard - Of Course I still love you
@endsection

@section('content')
<div class="container">
    <div class="row">
        @if($count_messages < 1)
        <div class="col-md-12">
            <div class="card bg-dark">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-white">You haven't written any message yet, write your first message...</h6>
                    <a href="{{ route('messages.index') }}" class="card-link">Create message</a>
                </div>
            </div>
        </div>
        @endif
        <div class="col-md-6">
            <div class="pt-5">
                <div class="pb-3">
                <img src="data:image/svg+xml;base64,{{ base64_encode($svgCode) }}" alt="avatar" class="img-fluid w-25">
                </div>
                <h3 class="text-white">Welcome <strong>{{ Auth::user()->name }}</strong></h3>
            <p class="text-white pt-4">Counter messages: <strong>{{ $count_messages }}</strong></p>
            <p class="text-white">Email: {{ Auth::user()->email }}</p>
            <p class="text-white">Profile created at: {{ Auth::user()->created_at }}</p>
                <p class="text-white pt-4 fw-bold">Switch mode:</p>
                <form method="post" action="{{ route('dashboard') }}">
                    @csrf
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="trapMode1" name="trap">
                    <label class="form-check-label text-white" for="trapMode1">It's a Trap!</label>
                </div>
                    <button type="submit" class="btn btn-secondary mt-2">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            @if(Auth::user()->trap == 0)
                <img src="{{ asset('/img/satellite.png') }}" class="img-fluid" alt="satellite">
            @else
                    <iframe class="mt-5 giphy-embed" src="https://giphy.com/embed/Z1LYiyIPhnG9O" width="100%" height="258" allowFullScreen></iframe>
            @endif
        </div>
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
