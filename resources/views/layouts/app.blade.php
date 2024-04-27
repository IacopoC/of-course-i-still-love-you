<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="IacopoC">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <script src="{{asset('js/location.js')}}"></script>
    <x-head.tinymce-config/>
</head>
<body>
    <div id="app">
        <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <span class="fs-4">Of Course I Still Love You</span>
            </a>

            <ul class="nav nav-pills">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-body-secondary {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-body-secondary {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link text-body-secondary {{ (request()->is('messages')) ? 'active' : '' }}" href="{{ route('messages.index') }}">{{ __('Create Messages') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body-secondary {{ (request()->is('updowns')) ? 'active' : '' }}" href="{{ route('updowns.index') }}">{{ __('Create Updowns') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body-secondary {{ (request()->is('dashboard')) ? 'active' : '' }}" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-body-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </header>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
        <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-body-secondary">{{ date('Y') }} - Of Course I Still Love you | <a class="text-body-secondary text-decoration-none" href="{{ route('privacy') }}">{{ __('Privacy Policy') }}</a></p>

            <ul class="nav col-md-4 justify-content-end">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item"><a class="nav-link px-2 text-body-secondary" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @endif
                    @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link px-2 text-body-secondary" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                @else
                    <li class="nav-item"><a class="nav-link px-2 text-body-secondary" href="{{ route('messages.index') }}">{{ __('Create Messages') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-2 text-body-secondary" href="{{ route('updowns.index') }}">{{ __('Create Updowns') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-2 text-body-secondary" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                @endguest
            </ul>
        </footer>
        </div>
    </div>
    <script>
        window.google_api_key = "{{ env('GOOGLE_LOCATION_KEY') }}";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
