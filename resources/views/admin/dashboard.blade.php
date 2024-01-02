<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">

    <link rel="icon" href="{{asset('images/icone_voiture.png')}}"/>
    <title>@yield('title')</title>
    <!-- Icons -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/simple-line-icons.css')}}" rel="stylesheet">

    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- <style>
        .dashboard .dashboard-title, 
        .dashboard .dashboard-profile, 
        .dashboard .dashboard-profile .profile-links a{
            letter-spacing:1px;
        }
        .dashboard .dashboard-profile .profile-img img{
            border: 2px solid var(--dark-color) !important;
            border-radius : 50%;
            padding : 12px;
        }
        .dashboard .dashboard-profile .profile-links .nav-pills div .active{
            background-color: var(--dark-color);
            color:#212529;
        }
        .dashboard .dashboard-profile .profile-links .nav-pills div a:not(.active):hover {
            background-color:rgb(119, 118, 118);
            /* background-color: var(--green-color); */
        }
        .dashboard .dashboard-profile .profile-links .nav-link{
            color:white;
        }
        .dashboard .dashboard-profile .profile-links .nav{
            padding-left: 24px;
        }
    </style>     --}}
</head>

<body class="navbar-fixed sidebar-nav fixed-nav">
    <header class="navbar navbar-expand-lg sticky px-3">
        <div class="container-fluid">
            <button class="navbar-aside mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <button class="navbar-aside layout-toggler hidden-md-down" type="button">&#9776;</button>
            <ul class="ms-4 ms-lg-0 ps-4">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="fw-semibold fs-4">{{ config('title', 'Fsk Location') }}</span> 
                    <img class="car-image img-fluid" src="{{asset('images/car18.png')}}" width="50%" alt="car">
                </a>
            </ul>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main" aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse pe-4" id="main">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-semibold text-capitalize">
                    <li class="nav-item p-lg-1">
                        <a class="nav-link p-0 p-lg-3" aria-current="page" href="{{ route('index')}}">Home</a>
                    </li>
                    <li class="nav-item p-lg-1">
                        <a class="nav-link p-0 p-lg-3" aria-current="page" href="{{route('voitures.index')}}">cars</a>
                    </li>
                    {{-- <li class="nav-item p-lg-1">
                        <a class="nav-link p-0 p-lg-3" aria-current="page" href="#">About</a>
                    </li> --}}
                    <li class="nav-item p-lg-1">
                        <a class="nav-link p-0 p-lg-3" aria-current="page" href="#">Contact</a>
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
                {{-- <a href="{{ route('login') }}" class="btn ps-4 pe-4 d-lg-block d-none ms-2 rounded-pill me-3 main-btn">{{ __('Login') }}</a>
                <a href="{{ route('register') }}" class="btn ps-4 pe-4 d-lg-block d-none me-3 rounded-pill main-btn">{{ __('Registre') }}</a> --}}
            </div>
            @else
            <li class="nav-item dropdown p-lg-1">
                <a id="navbarDropdown" class="nav-link dropdown-toggle p-0 p-lg-3" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end py-1" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item fw-semibold py-0" href="{{ route('dashboard_admin') }}">
                        {{ __('dashboard') }}
                    </a>
                    <a class="dropdown-item fw-semibold py-0" href="{{ route('logout') }}"
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
    </header>
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item text-center pt-3 pb-2">
                    <div class="profile-img">
                        <img src="{{asset('images/'.Auth::user()->image_path)}}" class="" width="130px" height="130px" style="" alt="">
                    </div>
                    <div class="profile-name py-3">
                        <h5 class="fw-semibold text-capitalize">{{Auth::user()->name." ".Auth::user()->prenom}}</h5>
                        <span class="text-info fw-semibold">{{Auth::user()->email}}</span>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard_admin') }}" class="nav-link lien text-capitalize fw-semibold"><i class="fa fa-home"></i> home </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('all_reservations') }}" class="nav-link lien text-capitalize fw-semibold"><i class="fa-regular fa-calendar-days"></i> reservations </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('all_clients') }}" class="nav-link lien text-capitalize fw-semibold"><i class="fa fa-user"></i> clients</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('all_cars') }}" class="nav-link lien text-capitalize fw-semibold"><i class="fa-solid fa-car"></i> cars</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('accessoires.index') }}" class="nav-link lien text-capitalize fw-semibold"><i class="fa fa-acc"></i> accessoires</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lien text-capitalize fw-semibold"><i class="fa-solid fa-comments"></i> réclamations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lien text-capitalize fw-semibold"><i class="fa-solid fa-comments"></i> reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lien text-capitalize fw-semibold" id="logout" href="{{route('logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" type="button" role="">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        {{ __('Log out') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="animated fadeIn">
                @yield('content')
            </div>
        </div>
    </main>
    @include('sweetalert::alert')
    <script src="{{asset('js/all.min.js')}}"></script>
    {{-- <script src="{{asset('js/index.js')}}"></script> --}}
    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('admin/js/libs/jquery.min.js')}}"></script>
    <script src="{{asset('admin/js/libs/tether.min.js')}}"></script>
    <script src="{{asset('admin/js/libs/bootstrap.min.js')}}"></script>

    <script src="{{asset('admin/js/app.js')}}"></script>
    <!-- Grunt watch plugin -->
</body>
</html>
