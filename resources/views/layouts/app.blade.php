<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <link rel="icon" href="{{asset('images/icone_voiture.png')}}"/> -->
    <title>@yield('title')</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg sticky">
            <div class="container">
                <a class="navbar-brand logo w-75" href="{{ url('/') }}">
                    <span class="fs-3 fw-semibold">{{ config('title', 'Fsk Location') }}</span> 
                    <img class="car-image img-fluid" src="{{asset('images/car17.png')}}" width="16%"alt="car">
                </a>
                <button class="navbar-toggler" id="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmain" aria-controls="navmain" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navmain">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5 fw-semibold text-capitalize">
                        <li class="nav-item">
                            <a class="nav-link active p-2 p-lg-4" aria-current="page" href="{{ route('index')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-4" aria-current="page" href="{{ route('voitures.index')}}">cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-4 " aria-current="page" href="{{ route('contact')}}">Contact</a>
                        </li>
                        @guest
                            <li class="nav-item mt-3">
                                @if (Route::has('login'))
                                        <a class="btn ps-4 pe-4 d-lg-none mb-1 me-2 rounded-pill main-btn" href="{{ route('login') }}">{{ __('login') }}</a>
                                @endif
                                @if (Route::has('register'))
                                        <a class="btn ps-4 pe-4 d-lg-none mb-1 rounded-pill main-btn" href="{{ route('register') }}">{{ __('register') }}</a>
                                @endif
                            </li>
                    </ul>
                    <a href="{{ route('login') }}" class="btn ps-4 pe-4 d-lg-block d-none ms-2 rounded-pill me-4 main-btn">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="btn ps-4 pe-4 d-lg-block d-none me-3 rounded-pill main-btn">{{ __('Registre') }}</a>
                </div>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle p-2 p-lg-4" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end py-1" aria-labelledby="navbarDropdown">
                        @if(auth()->user()->role == "client")
                            <a class="dropdown-item fw-semibold py-3" href="{{ route('dashboard.index') }}">
                                {{ __('dashboard') }}
                            </a>
                        @else    
                            <a class="dropdown-item fw-semibold py-3" href="{{ route('dashboard_admin') }}">
                                {{ __('dashboard') }}
                            </a>
                        @endif
                        <a class="dropdown-item fw-semibold py-3" href="{{ route('logout') }}"
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
            </div>
            <div class="btn-up" style="z-index:1">
                <button class="btn p-2 text-capitalize position-fixed bottom-0 mb-3" id="scrollingButton">
                    <i class="fa-solid fa-arrow-up-long fa-bounce fa-lg pt-1 px-1 "></i>
                </button>
            </div>
        </nav>
        <main class="">
            @yield('landing')
        </main>
    </div>
    <main class="">
            @yield('about-us')
    </main>
    <main class="">
            @yield('our-featurs')
    </main>
    <main class="">
            @yield('about')
    </main>
    <main class="">
            @yield('reviews')
    </main>
    <main class="">
            @yield('contact-us')
    </main>
    <!-- <main class="">
            @yield('details')
    </main> -->
    <main class="">
            @yield('content')
    </main>
    @include('layouts.footer')
    @include('sweetalert::alert')
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
</body>
</html>
