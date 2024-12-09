<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/books') }}">
                EbooK
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mx-3">
                    <li class="navbar-item me-auto">
                        @if (Auth::check()) <!-- Проверяем, авторизован ли пользователь -->
                            <a class="dropdown-item" href="{{ route('authors.index')}}">
                                Liste d'auteurs
                            </a>
                        @endif
                    </li>
                    <li class="navbar-item me-auto mx-3">
                        @if (Auth::check()) <!-- Проверяем, авторизован ли пользователь -->
                            <a class="dropdown-item" href="{{ route('categories.index')}}">
                                Liste de catégories
                            </a>
                        @endif
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                            @if (Auth::check()) <!-- Проверяем, авторизован ли пользователь -->
                            <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">
                                {{ __('Edit Profile') }}
                            </a>
                            @endif
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>