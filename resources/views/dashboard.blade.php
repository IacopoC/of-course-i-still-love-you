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
                <p class="text-white">Switch mode:</p>
                <form method="post" action="{{ route('dashboard') }}">
                    @csrf
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="trapMode1" name="trap">
                    <label class="form-check-label text-white" for="trapMode1">It's a Trap mode!</label>
                </div>
                    <button type="submit" class="btn btn-light mt-2">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div id="circle-orbit-container">
                <div id="inner-orbit">
                    <div class="inner-orbit-cirlces"></div>
                </div>
                <div id="middle-orbit">
                    <div class="middle-orbit-cirlces"></div>
                </div>
                <div id="outer-orbit">
                    <div class="outer-orbit-cirlces"></div>
                </div>
            </div>
            <div class="image">
                <img src="{{ asset("img/achab.png") }}" class="img-fluid visually-hidden" id="image-achab">
            </div>
        </div>
        <div class="height-140"></div>
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
