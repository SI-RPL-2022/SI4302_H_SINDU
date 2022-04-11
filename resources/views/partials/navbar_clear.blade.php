<nav id="navbar" class="navbar navbar-expand-md py-3 sticky-top">
    <div class="container">
        <a id="navbar-brand" class="navbar-brand d-flex" href="{{ url('/') }}">
            <h3 class="text-light">Sin</h3><h3>du</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('landing.page') }}">{{ __('Beranda') }}</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('donasi') }}">{{ __('Donasi') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">{{ __('Tentang Kami') }}</a>
                    </li> --}}
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a id="login-btn" class="btn text-light bg-sindu"
                                href="{{ route('login') }}">{{ __('Masuk') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
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

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("navbar").style.background = "#4285F4";
        document.getElementById("navbar").style.transition = "1s";
        var login = document.getElementById("login-btn"); 
        login.classList.remove("bg-sindu")
        login.classList.remove("text-light")
        login.classList.add("bg-light");
        login.style.color = "#4285F4"
        login.style.transition = "1s" ;
        document.getElementById("logo").style.fontSize = "35px";
      } else {
        document.getElementById("navbar").style.background = "linear-gradient(180deg, rgba(0,0,0,0.5046612394957983) 0%, rgba(0,0,0,0) 100%)";
        document.getElementById("navbar").style.transition = "1s";
        var login = document.getElementById("login-btn"); 
        login.classList.remove("bg-light")
        login.classList.remove("text-sindu")
        login.classList.add("bg-sindu");
        login.classList.add("text-light");
        login.style.transition = "1s" ;
        document.getElementById("logo").style.fontSize = "35px";
      }
    }
    </script>
