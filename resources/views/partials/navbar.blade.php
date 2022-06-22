<nav id="navbar" class="navbar navbar-expand-md py-1 bg-sindu sticky-top">
    <div class="container align-items-center">
        <a id="navbar-brand" class="align-items-center navbar-brand d-flex" href="{{ url('/') }}">
            <h3 class="text-light text-shadow">Sin</h3>
            <h3 id="du" class="text-shadow">du</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item mx-2">
                        <a class="nav-link text-light"
                            href="{{ route('landing.page') }}">{{ __('Beranda') }}</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-light"
                            href="{{ route('donasi.create') }}">{{ __('Donasi') }}</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-light"
                            href="{{ route('show.all.materi') }}">{{ __('Materi') }}</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-light" href="{{ route('aboutus') }}">{{ __('Tentang Kami') }}</a>
                    </li>
                    @if(Route::has('login'))
                        <li class="nav-item mx-2">
                            <a id="login-btn" class="btn bg-light" style="color:#297BBF" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                        </li>
                    @endif

                    @if(Route::has('register'))
                        {{-- <li class="nav-item mx-2">
                            <a id="reg-btn" class="btn text-light bg-sindu" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li> --}}
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
