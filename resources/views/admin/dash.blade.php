<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('title', 'Fsk Location') }}</title>
    <link rel="stylesheet" href="{{asset('css/dash.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
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
    </style>    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg sticky">
            <div class="container">
                <a class="navbar-brand logo w-75" href="{{ url('/') }}">
                    <span class="fs-3 fw-semibold">{{ config('title', 'Fsk Location') }}</span> 
                    <img class="car-image img-fluid" src="images/auto_car16.png" width="20%"alt="car">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main" aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="main">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5 fw-semibold text-capitalize">
                        <li class="nav-item">
                            <a class="nav-link active p-2  p-lg-3" aria-current="page" href="{{ route('index')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3" aria-current="page" href="/voitures">cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3 " aria-current="page" href="">details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3" aria-current="page" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3" aria-current="page" href="{{ route('contact')}}">Contact</a>
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
                    <a href="{{ route('login') }}" class="btn ps-4 pe-4 d-lg-block d-none ms-2 rounded-pill me-3 main-btn">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="btn ps-4 pe-4 d-lg-block d-none me-3 rounded-pill main-btn">{{ __('Registre') }}</a>
                </div>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle p-2 p-lg-3" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('dashboard.index') }}" data-confirm-delete="true">
                            {{ __('dashboard') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" data-confirm-delete="true">
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
    </div>
    {{-- @include('admin.aside')  --}}
    <div class="dashboard">
        <div class="d-flex">
            <div class="navbar-expand-lg col-3">
                <button class="navbar-toggler px-5 pt-5" type="button" data-bs-toggle="collapse" data-bs-target="#aside" aria-controls="aside" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse bg-dark px-3" id="aside">
                    <div class="dashboard-profile text-light">
                        <div class="text-center">
                            <div class="profile-img px-0 pb-1 pt-3">
                                <img src="../images/profile1.jpg" class="" width="170px" height="170px" style="" alt="">
                            </div>
                            <div class="profile-name py-3">
                                <h4 class="fw-semibold text-capitalize">ali lm9edem</h4>
                                <span class="text-info fw-semibold">ali@gmail.com</span>
                            </div>
                            <div class="profile-links py-3">
                                <div class="nav nav-pills fw-semibold" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <div class="nav-item w-100 py-2">
                                        <a href="{{ route('dashboard.index') }}" class="nav-link lien active py-1 mb-1 text-capitalize text-start w-100 text-decoration-none" onclick="setActive(this)" aria-current="page"><i class="fa fa-home me-5"></i>home</a>
                                    </div>
                                    <div class="nav-item w-100 py-2">
                                        <a href="{{ route('all_reservations') }}" class="nav-link lien py-1 mb-1 text-capitalize text-start w-100 text-decoration-none" onclick="setActive(this)" aria-current="page"><i class="fa fa-user me-5"></i>all reservations</a>
                                    </div>
                                    <div class="nav-item w-100 py-2">
                                        <a href="{{ route('all_clients') }}" class="nav-link lien py-1 mb-1 text-capitalize text-start w-100 text-decoration-none" aria-current="page"><i class="fa fa-user me-5"></i>all clients</a>
                                    </div>
                                    <div class="nav-item w-100 py-2">
                                        <a href="{{ route('all_cars') }}" class="nav-link lien py-1 mb-1 text-capitalize text-start w-100 text-decoration-none"><i class="fa fa-home me-5"></i>all cars</a>
                                    </div>
                                    <div class="nav-item w-100 py-2">
                                        <a href="{{ route('all_accessoires') }}" class="nav-link lien py-1 mb-1 text-capitalize text-start w-100 text-decoration-none" aria-current="page"><i class="fa fa-user me-5"></i>all accessoires</a>
                                    </div>
                                    <div class="nav-item w-100 py-2">
                                        <a href="/dash" class="nav-link py-1 mb-1 text-capitalize text-start w-100 text-decoration-none" aria-current="page"><i class="fa fa-user me-5"></i>réclamations & reviews</a>
                                    </div>
                                    <div class="nav-item w-100">
                                        <a href="/dash" class="nav-link py-1 mb-1 text-capitalize text-start w-100 text-decoration-none" aria-current="page"><i class="fa fa-user me-5"></i>log out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>    
            <main class="col-9">
                @yield('content')
            </main>            
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
</body>
</html>