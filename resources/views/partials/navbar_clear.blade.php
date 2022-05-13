<nav id="navbar" class="navbar navbar-expand-md py-1 fixed-top gradient-y">
    <div class="container align-items-center">
        <a id="navbar-brand" class="align-items-center navbar-brand d-flex" href="{{ url('/') }}">
            <h3 class="text-light text-shadow">Sin</h3>
            <h3 id="du" class="text-shadow">du</h3>
        </a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <i class="fa-solid fa-bars text-white"></i>
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
                    {{-- <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('about') }}">{{ __('Tentang Kami') }}</a>
                    </li> --}}
                    @if(Route::has('login'))
                        <li class="nav-item mx-2">
                            <a id="login-btn" class="btn text-light"
                                style="background-color: #297BBF; font-weight: 600;"
                                href="{{ route('login') }}">{{ __('Masuk') }}</a>
                        </li>
                    @endif

                    @if(Route::has('register'))
                        {{-- <li class="nav-item mx-2">
                            <a id="reg-btn" class="btn text-light bg-sindu" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li> --}}
                    @endif
                @else
                    <li class="nav-item mx-2">
                        <a class="nav-link text-light"
                            href="{{ route('landing.page') }}">{{ __('Beranda') }}</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-light"
                            href="{{ route('donasi.create') }}">{{ __('Donasi') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        @php
                            $nick = explode(' ',trim(Auth::user()->name))
                        @endphp
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{  "Hi, ".ucwords(strtolower($nick[0]))."" }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->level == 'admin')
                            <a class="dropdown-item" href="{{ route('admin.index') }}">
                                {{ __('Dashboard Admin') }}
                            </a>
                            @elseif(Auth::user()->level == 'relawan')
                            <a class="dropdown-item" href="{{ route('relawan.index') }}">
                                {{ __('Dashboard Relawan') }}
                            </a>
                            @endif
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

<script>
    // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("navbar").style.background = "#297BBF";
            document.getElementById("navbar").style.boxShadow = "0 -2em 4em black";
            document.getElementById("du").style.color = "white";
            document.getElementById("navbar").style.transition = "1s";
            document.getElementById("du").style.transition = "1s";
            var login = document.getElementById("login-btn");
            login.classList.remove("bg-sindu", "text-light");
            login.classList.add("bg-light");
            login.style.color = "#297BBF";
            login.style.transition = "1s";
            var reg = document.getElementById("reg-btn");
            reg.classList.remove("bg-sindu", "text-light"),
                reg.classList.add("bg-light"),
                reg.style.color = "#297BBF";
            reg.style.transition = "1s";
        } else {
            document.getElementById("navbar").style.background =
                "linear-gradient(180deg, rgba(0,0,0,0.5046612394957983) 0%, rgba(0,0,0,0) 100%)";
            document.getElementById("navbar").style.boxShadow = "none";
            document.getElementById("du").style.color = "#297BBF";
            document.getElementById("navbar").style.transition = "1s";
            document.getElementById("du").style.transition = "1s";
            var login = document.getElementById("login-btn");
            login.classList.remove("bg-light", "text-sindu");
            login.style.background = "#297BBF";
            login.classList.add("text-light");
            login.style.transition = "1s";
            var reg = document.getElementById("reg-btn");
            reg.classList.remove("bg-light", "text-sindu");
            reg.classList.add("bg-sindu", "text-light");
            reg.style.transition = "1s";
            var nav = document.getElementById('navbar');
            nav.classList.remove("shadow");
            nav.style.transition = "1s";
        }
    }

</script>
