<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fake Instagram</title>

    <!-- scripts -->
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('js/nProgress.js') }}" defer></script>
    <script src="{{ asset('js/loader.js') }}" defer></script>
    <script src="{{ asset('js/like.js') }}" defer></script>
    <script src="{{ asset('js/navLinkActive.js') }}" defer></script>
    <script src="{{ asset('js/comments.js') }}" defer></script>
    <script src="{{ asset('js/search.js') }}" defer></script> --}}
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <!-- FontAwesome -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"> -->
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>

    @include('includes.loading')

    <div id="app" class="app">
        <nav class="navbar navbar-expand-lg navbar-light navbar-laravel fixed-top">
            <div class="container">
                <a class="navbar-brand d-flex d-justify-content-center align-items-center" href="{{ url('/') }}"><i class="fab fa-instagram navbar-brand-logo"></i><span class="navbar-brand-line"></span><span class="navbar-brand-text">Fake Instagram</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @guest
                    @else
                    <form action="{{ route('users') }}" method="GET" class="d-flex ml-0 ml-lg-5 mt-4 mt-lg-0" id="formSearch">
                        <input class="form-control mr-2" type="search" placeholder="Search users"      aria-label="Search" name="search" id="search">
                        <button class="btn btn-outline-dark" type="submit">Search</button>
                    </form>
                    @endguest
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-center">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="{{ route('favorites') }}" class="nav-link">Favorites</a></li>
                            <li class="nav-item"><a href="{{ route('users') }}" class="nav-link">Users</a></li>
                            <li class="nav-item"><a href="{{ route('image_upload') }}" class="nav-link">Upload Image</a></li>
                            <li class="nav-item">
                                <a href="{{ route('user_perfil', ['id' => Auth::user()->nick]) }}" class="nav-link d-flex align-items-center justify-content-center">
                                    <div class="avatar">
                                        <img src="{{ route('user_avatar', ['file_name' => Auth::user()->image]) }}" alt="user avatar" class="avatar-img d-block rounded-circle">
                                    </div>
                                    <div class="ml-2">
                                            {{ Auth::user()->nick }}
                                    </div>
                                </a>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        @yield('footer')

    </div>
</body>
</html>
