<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Of Course I Still Love You</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link px-2 {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link px-2 {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link px-2 {{ (request()->is('messages')) ? 'active' : '' }}" href="{{ route('messages.index') }}">{{ __('Create Messages') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 {{ (request()->is('updowns')) ? 'active' : '' }}" href="{{ route('updowns.index') }}">{{ __('Create Updowns') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 {{ (request()->is('dashboard')) ? 'active' : '' }}" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link mb-0 px-2">
                            {{ Auth::user()->name }}
                        </p>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-link pb-2 mx-2" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
                    </li>
                @endguest
                    <li class="nav-item">
                        <a href="mailto:{{ env('CONTACT_EMAIL') }}"><button type="button" class="btn btn-primary pb-2 mx-2">Contact us</button></a>
                    </li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="logoutModalLabel">Are you sure?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
