@extends('layouts.app')

@section('title','Fsk Location')

@section('landing')
<style>
    .landing {
        background-image:url(../images/car1_BW_1.jpg);
        background-repeat:no-repeat; 
        background-size:cover;
        min-height: 113vh;
    }
    .box-landing1 .h1{
        background-image: url(../images/blue.webp);
        background-size: cover;
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        font-size: 36px;
    }
    /* .box-landing2 input:not(input[type="submit"]) {
        width: 250px;
    }
    @media (max-width: 767px) {
        .box-landing2 {
            width: 330px !important;
        }
    } */
</style>
<div class="landing">
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-12 col-lg-6 box-landing1 text-capitalize text-white text-lg-start text-center me-5 p-5">
                <h1 class="pt-3 pb-2 h1">Plan your trip now
                    <h1 class="text-white">&</h1>
                </h1>
                <h1 class="py-2 h1">Save big with our car rental</h1>
                <h5 class="pt-4 lh-lg">Driving your dreams to reality with an exquisite fleet of versatile vehicles for unforgettable journeys !</h5>
            </div>
        </div>
    </div>
</div>
@endsection
@section('about-us')
<div class="container py-5">
    <div class="about-us">
        <h3 class="text-capitalize text-center py-4 mb-3">Quick & easy car rental</h3>
        <div class="row text-center">
            <div class="col-md-4 py-3">
                <img src="{{asset('images/iconbox-image-1.png')}}" alt="">
                <h3 class="text-capitalize fw-bold">select your car</h3>
                <p class="p-3">Débloquez des aventures sans précédent et des voyages mémorables avec notre vaste flotte de véhicules adaptés à tous les besoins, goûts et destinations.</p>
            </div>
            <div class="col-md-4 py-3">
                <img src="{{asset('images/iconbox-image-1.png')}}" alt="">
                <h3 class="text-capitalize fw-bold">pick up your date</h3>
                <p class="p-3">Choisissez votre date idéale et laissez-nous vous emmener dans un voyage rempli de commodité, de flexibilité et d'expériences inoubliables.</p>
            </div>
            <div class="col-md-4 py-3">
                <img class="mt-3" src="{{asset('images/iconbox-image-3.png')}}" alt="">
                <h3 class="text-capitalize fw-bold mt-1">let's drive</h3>
                <p class="p-3">Commodité sans tracas car nous prenons soin de chaque détail, vous permettant de vous détendre et d'embrasser un confort rempli de voyage.</p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('our-featurs')
<style>
    .featurs .row .col-12 .car .badge{
        top: -5px;
        right: -20px;
        padding: 6px;
        width: 18%;
        transform: rotate(20deg)
    }
</style>
<div class="container py-5">
    <div class="featurs py-5">
        <h3 class="text-capitalize text-center mb-3">Our new cars</h3>
        <div class="row py-5">
            @foreach ($voitures as $voiture)
                <div class="col-12 col-lg-4 mb-5">
                    <a href="{{ route('details', $voiture->immatriculation )}}" class="text-decoration-none text-dark">
                        <div class="car card shadow bg-light p-3 pb-0 mb-3 position-relative h-100">
                            <span class="badge position-absolute rounded-pill bg-danger">
                                New
                            </span>
                            <div class="car-image pb-2">
                                <img class="img-fluid rounded" src="{{ asset('images/'.$voiture->image_path)}}" width="100%" alt="">
                            </div>
                            <div class="car-details">
                                <div class="px-1 pt-2 pb-3 text-capitalize">
                                    <h4>{{$voiture->marque." ".$voiture->model}}</h4>
                                </div>
                                {{-- <div class="reviews-star text-warning px-1">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <span class="text-black ms-3">5.0</span>
                                </div> --}}
                                <div class="list-details px-1">
                                    <ul class="list-unstyled d-flex justify-content-between">
                                        <li>
                                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="currentColor"><path d="M2 4a2 2 0 1 1 2.75 1.855v5.395h6.5V5.855a2 2 0 1 1 1.5 0v5.395H16c.964 0 1.612-.002 2.095-.066c.461-.063.659-.17.789-.3c.13-.13.237-.328.3-.79c.064-.482.066-1.13.066-2.094V5.855a2 2 0 1 1 1.5 0v2.197c0 .898 0 1.648-.08 2.242c-.084.628-.27 1.195-.726 1.65c-.455.456-1.022.642-1.65.726c-.594.08-1.343.08-2.242.08H12.75v5.395a2 2 0 1 1-1.5 0V12.75h-6.5v5.395a2 2 0 1 1-1.5 0V5.855A2 2 0 0 1 2 4Z"/><path fill-rule="evenodd" d="M17.25 15a.75.75 0 0 1 .75-.75h2.286c1.375 0 2.464 1.134 2.464 2.5a2.502 2.502 0 0 1-1.641 2.358l1.53 2.5a.75.75 0 1 1-1.279.784l-1.923-3.142h-.687V22a.75.75 0 0 1-1.5 0v-7Zm1.5 2.75h1.536c.518 0 .964-.433.964-1s-.446-1-.964-1H18.75v2Z" clip-rule="evenodd"/></g></svg></span>
                                            <span class="text-capitalize ps-1">{{$voiture->transmission}}</span>
                                        </li>
                                        <li>
                                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 18S4 10 4 6s2-4 2-4h1s1 0 1 1s-1 1-1 3s3 4 3 7s-3 5-3 5m5-1c-1 0-4 2.5-4 2.5c-.3.2-.2.5 0 .8c0 0 1 1.8 3 1.8h6c1.1 0 2-.9 2-2v-1c0-1.1-.9-2-2-2h-5Z"/></svg></i></span>
                                            <span class="text-capitalize ps-1">{{$voiture->places}} places</span>
                                        </li>
                                        <li>
                                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><path fill="currentColor" d="M19 14h-3v2h3v-2m3 7H3V11l8-8h10a1 1 0 0 1 1 1v17M11.83 5l-6 6H20V5h-8.17Z"/></g></svg></span>
                                            <span class="text-capitalize ps-1">{{$voiture->portes}} portes</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between">
                                        <li>
                                            <span><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M32 64C32 28.7 60.7 0 96 0h160c35.3 0 64 28.7 64 64v192h8c48.6 0 88 39.4 88 88v32c0 13.3 10.7 24 24 24s24-10.7 24-24V222c-27.6-7.1-48-32.2-48-62V96l-32-32c-8.8-8.8-8.8-23.2 0-32s23.2-8.8 32 0l77.3 77.3c12 12 18.7 28.3 18.7 45.3V376c0 39.8-32.2 72-72 72s-72-32.2-72-72v-32c0-22.1-17.9-40-40-40h-8v144c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64zm64 16v96c0 8.8 7.2 16 16 16h128c8.8 0 16-7.2 16-16V80c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16z"/></svg></span>
                                            <span class="text-capitalize ps-1">{{$voiture->type_carburant}}</span>
                                        </li>
                                        <li>
                                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M17.03 6C18.11 6 19 6.88 19 8v11c0 1.13-.89 2-1.97 2c0 .58-.47 1-1.03 1c-.5 0-1-.42-1-1H9c0 .58-.5 1-1 1c-.56 0-1.03-.42-1.03-1C5.89 21 5 20.13 5 19V8c0-1.12.89-2 1.97-2H9V3c0-.58.46-1 1-1h4c.54 0 1 .42 1 1v3h2.03M13.5 6V3.5h-3V6h3M8 9v9h1.5V9H8m6.5 0v9H16V9h-1.5m-3.25 0v9h1.5V9h-1.5Z"/></svg></span>
                                            <span class="text-capitalize ps-1">{{$voiture->bagages}} bagages</span>
                                        </li>
                                        <li>
                                            <span><i class="fas fa-star filled"></i></span>
                                            <span class="text-capitalize ps-1">{{$voiture->assurance}}</span>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="box-price d-flex justify-content-between pt-1 px-1">
                                    <h4 class="text-danger pt-1">{{$voiture->prix_par_jour}} <span>dh</span><span class="text-muted"> / j</span></h4>
                                    <div class="">
                                        <a href="{{ route('reservation', $voiture->immatriculation )}}" class="btn text-decoration-none bg-primary py-1 text-white fw-semibold">Réserver</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>  
            @endforeach
            {{-- <div class="box-cars row py-3">
            </div>         --}}
        </div>
    </div>
</div>
@endsection
@section('about')
<style>
    .box-numbers {
        background-image: url("images/image2.jpg");
        background-repeat:no-repeat; 
        background-size:cover;
        background-position: center;
    }
    @media (min-width: 500px) and (max-width : 767px) {
        .numbers {
            width : 350px !important;
            margin: auto !important;
        }
    }
</style>
<div class="container">
    <div class="about pb-5">
        <div class="about-box1 text-center text-capitalize pb-5 px-2">
            <h3 class="mb-4">about us</h3>
            <h5>best exeperience with us</h5>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-5 py-5">
                <img class="img-fluid" src="images/range rover.png" width="90%" alt="">
            </div>
            <div class="col-lg-6 py-5 d-flex justify-content align-items-center pt-3">
                <p class="lh-lg px-4 fs-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. In enim est id eius sed deserunt eos repellendus facere nobis ex. Saepe esse explicabo eligendi vitae enim ullam, aperiam corporis quaerat
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. In enim est id eius sed deserunt eos repellendus facere nobis ex. Saepe esse explicabo eligendi vitae enim ullam, aperiam corporis quaerat.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="box-numbers mb-3">
    <div class="row py-5 mx-5">
        <div class="col-md-6 col-lg-3 my-3">
            <div class="numbers card text-center text-capitalize py-2 w-100">
                <h2 class="fw-semibold counter" data-count="500">0</h2>
                <h5>cars are rented</h5>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 my-3">
            <div class="numbers card text-center text-capitalize py-2 w-100">
                <h2 class="fw-semibold counter" data-count="100">0</h2>
                <h5>Car Types</h5>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 my-3">
            <div class="numbers card text-center text-capitalize py-2 w-100">
                <h2 class="fw-semibold counter" data-count="300">0</h2>
                <h5>Happy customers</h5>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 my-3">
            <div class="numbers card text-center text-capitalize py-2 w-100">
                <h2 class="fw-semibold counter" data-count="200">0</h2>
                <h5>reviews customers</h5>
            </div>
        </div>
    </div>
</div>
@endsection
@section('reviews')
<style>
    .carousel-control-prev, .carousel-control-next{
        width: 0%;
        opacity: 1;
    }
    .carousel-control-prev :hover,
    .carousel-control-next:hover,
    .carousel-control-next:focus,
    .carousel-control-prev:focus{
        color : var( --main-color);
    }
    .carousel-control-prev {
        left : -9px;
    }
    .carousel-control-next {
        right : -9px;
    }
    .arrow {
        font-size: 35px;
        color : var( --main-color);
    }
    .carousel-indicators .active {
        background-color: var( --main-color);
        background-color: black !important;
        opacity: 1 ;
    }
    .carousel-indicators button {
        background-color: var( --main-color) !important;
        opacity: 0.5;
    }
    .carousel-indicators {
        bottom : -40px;
    }
    @media (max-width: 600px) {
        .carousel-control-prev, .carousel-control-next{
            width: 3%;
        }
        .carousel-control-prev {
            left : 0px;
        }
        .carousel-control-next {
            right : 0px;
        }
    }
    
</style>
<div class="container pt-4 pb-5 my-5">
    <div class="reviews">
        <div class="reviews-title text-center text-capitalize ">
            <h3 class="my-4">our reviews</h3>
            <h5 class="mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente,voluptatum</h5>
        </div>
        <div id="carousel-reviews" class="carousel slide mt-5">
            <div class="carousel-indicators mb-5">
                <button type="button" data-bs-target="#carousel-reviews" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel-reviews" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel-reviews" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner py-3">
                <div class="carousel-item active px-3 py-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card p-3 mt-2 mb-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="reviews-title">
                                        <h4 class="text-capitalize">alina bootcamp</h4>
                                    </div>
                                    <div class="reviews-star text-warning">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores, quibusdam numquam neque error incidunt similique eveniet. Doloribus, necessitatibus! Quod neque maiores eum deserunt praesentium natus aspernatur voluptates eveniet nemo dolores?
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card p-3 mt-2 mb-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="reviews-title">
                                        <h4 class="text-capitalize">ali alami</h4>
                                    </div>
                                    <div class="reviews-star text-warning">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores, quibusdam numquam neque error incidunt similique eveniet. Doloribus, necessitatibus! Quod neque maiores eum deserunt praesentium natus aspernatur voluptates eveniet nemo dolores?
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card p-3 mt-2 mb-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="reviews-title">
                                        <h4 class="text-capitalize">reda dehar</h4>
                                    </div>
                                    <div class="reviews-star text-warning">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores, quibusdam numquam neque error incidunt similique eveniet. Doloribus, necessitatibus! Quod neque maiores eum deserunt praesentium natus aspernatur voluptates eveniet nemo dolores?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item px-3 py-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card p-3 mt-2 mb-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="reviews-title">
                                        <h4 class="text-capitalize">walid salami</h4>
                                    </div>
                                    <div class="reviews-star text-warning">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores, quibusdam numquam neque error incidunt similique eveniet. Doloribus, necessitatibus! Quod neque maiores eum deserunt praesentium natus aspernatur voluptates eveniet nemo dolores?
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card p-3 mt-2 mb-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="reviews-title">
                                        <h4 class="text-capitalize">walid salami</h4>
                                    </div>
                                    <div class="reviews-star text-warning">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores, quibusdam numquam neque error incidunt similique eveniet. Doloribus, necessitatibus! Quod neque maiores eum deserunt praesentium natus aspernatur voluptates eveniet nemo dolores?
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card p-3 mt-2 mb-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="reviews-title">
                                        <h4 class="text-capitalize">walid salami</h4>
                                    </div>
                                    <div class="reviews-star text-warning">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores, quibusdam numquam neque error incidunt similique eveniet. Doloribus, necessitatibus! Quod neque maiores eum deserunt praesentium natus aspernatur voluptates eveniet nemo dolores?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item px-3 py-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card p-3 mt-2 mb-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="reviews-title">
                                        <h4 class="text-capitalize">walid salami</h4>
                                    </div>
                                    <div class="reviews-star text-warning">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores, quibusdam numquam neque error incidunt similique eveniet. Doloribus, necessitatibus! Quod neque maiores eum deserunt praesentium natus aspernatur voluptates eveniet nemo dolores?
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card p-3 mt-2 mb-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="reviews-title">
                                        <h4 class="text-capitalize">alina bootcamp</h4>
                                    </div>
                                    <div class="reviews-star text-warning">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores, quibusdam numquam neque error incidunt similique eveniet. Doloribus, necessitatibus! Quod neque maiores eum deserunt praesentium natus aspernatur voluptates eveniet nemo dolores?
                                </p>
                            </div>
                        </div>
                        <!-- <div class="col-lg-4">
                            <div class="card p-3 mt-2 mb-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="reviews-title">
                                        <h4 class="text-capitalize">alina bootcamp</h4>
                                    </div>
                                    <div class="reviews-star text-warning">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores, quibusdam numquam neque error incidunt similique eveniet. Doloribus, necessitatibus! Quod neque maiores eum deserunt praesentium natus aspernatur voluptates eveniet nemo dolores?
                                </p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev arrow" type="button" data-bs-target="#carousel-reviews" data-bs-slide="prev">
                <span class="fa-solid fa-chevron-left" aria-hidden="false"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next arrow" type="button" data-bs-target="#carousel-reviews" data-bs-slide="next">
                <span class="fa-solid fa-chevron-right" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
@endsection