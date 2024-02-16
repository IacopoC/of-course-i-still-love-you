@extends('layouts.app')

@section('title')
    Verify Email - Of Course I still love you
@endsection

@section('description')
    Check you email for verification link. If you did not receive the email, click here.
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <h4 class="text-white pt-4">{{ __('Verify Your Email Address') }}</h4>
                        @if (session('resent'))
                    <p class="text-white">{{ __('A fresh verification link has been sent to your email address.') }}</p>
                        @endif

                <p class="pt-4">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                <p> {{ __('If you did not receive the email') }}: </p>
                        <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
@endsection
