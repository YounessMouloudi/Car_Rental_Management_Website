@extends('layouts.app')

@section('title','Details Voiture')

@section('content')

<link rel="stylesheet" href="{{ asset('css/details_style.css')}}">

<div class="box-all-details container-fluid container-lg mx-auto mx-lg-auto px-lg-auto px-5 py-5">
    <div class="title-details pb-5 text-center">
        <h1 class="text-capitalize">détails cars 
            <img src="{{asset('images/auto_car16.png')}}" class="" width="10%" alt="ym">
        </h1>
    </div>
    <div class="row pe-3">
        {{-- @error('date_fin')
            <h5 class="alert alert-danger">date de retour doit etre aprés date de départ</h5>
        @enderror  --}}
    </div>
    <div class="cars-details pb-5">
        <div class="row">
            <div class="box-details col-12 col-lg-9 card bg-transparent mb-4">
                <div class="row py-3 px-1">
                    <div class="box-images col-md-12 col-lg-7 mb-4 px-3">
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('images/'.$voiture->image_path) }}" class="img-fluid rounded w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('../images/voiture-intérieure-01.jpg') }}" class="img-fluid rounded w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('../images/voiture-intérieure-02.jpg') }}" class="img-fluid rounded w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('../images/voiture-intérieure-03.jpg') }}" class="img-fluid rounded w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('../images/voiture-intérieure-04.jpg') }}" class="img-fluid rounded w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev arrow" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="fa-solid fa-arrow-left fa-xl arrow-left rounded-circle p-2" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next arrow" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="fa-solid fa-arrow-right fa-xl arrow-right rounded-circle p-2" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="box-caracteristiques col-md-12 col-lg-5 text-capitalize px-3 ps-lg-3 mb-5">
                        <div class="title-car mt-3 mb-4">
                            <h2 class="mb-3">{{$voiture->model}}</h2>
                            {{-- <h2 class="mb-3">BMW Série3</h2> --}}
                            <h5 class="lh-lg">année : {{$voiture->année}}</h5>
                        </div>
                        <div class="">
                            <h4 class="text-decoration-underline">spécifications cars : </h4>
                        </div>
                        <div class="list-details h5 text-capitalize pt-2 ps-lg-2">
                            <ul class="list-unstyled">
                                <li class="h5 py-1">
                                    <label class="me-2">- make :</label>
                                    <span class="fw-semibold">{{$voiture->marque}}</span>
                                </li>
                                {{-- <li class="h5 py-1">
                                    <label class="me-2">- climatisation :</label>
                                    <span class="fw-semibold">{{$voiture->transmission}}</span>
                                </li> --}}
                                <li class="h5 py-1">
                                    <label class="me-2">- fuel type :</label>
                                    <span class="fw-semibold">{{$voiture->type_carburant}}</span>
                                </li>
                                <li class="h5 py-1">
                                    <label class="me-2">- transmission: :</label>
                                    <span class="fw-semibold">{{$voiture->transmission}}</span>
                                </li>
                                <li class="h5 py-1">
                                    <label class="me-2">- doors :</label>
                                    <span class="fw-semibold">{{$voiture->portes}}</span>
                                </li>
                                <li class="h5 py-1">
                                    <label class="me-2">- bagages :</label>
                                    <span class="fw-semibold">{{$voiture->bagages}}</span>
                                </li>
                                <li class="h5 py-1">
                                    <label class="me-2">- seats: :</label>
                                    <span class="fw-semibold">{{$voiture->places}}</span>
                                </li>
                                <li class="h5 py-1">
                                    <label class="me-2">- kilométrage :</label>
                                    <span class="fw-semibold">70 000 km</span>
                                </li>
                                <li class="h5 py-1">
                                    <label class="me-2">- vin :</label>
                                    <span class="fw-semibold">1VXEDYROTER</span>
                                </li>
                                <li class="h5 py-1">
                                    <label class="me-2">- engine (hp) :</label>
                                    <span class="fw-semibold">6 chv</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="box-tabs row pb-5 mt-md-0">
                    <ul class="nav nav-tabs mb-0 px-3" id="myTab" >
                        <li class="nav-item mb-0" role="presentation">
                            <button class="nav-link active text-capitalize" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description cars" aria-selected="true">description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-capitalize" id="caracteristiques-tab" data-bs-toggle="tab" data-bs-target="#caracteristiques" type="button" role="tab" aria-controls="caracteristiques cars" aria-selected="">caracteristiques</button>
                        </li>                        
                    </ul>
                    <div class="tab-content pt-3" id="myTabContent">
                        <div class="tab-pane fade show active p-2" id="description" tabindex="0">
                            <p class="lh-lg ">
                                {{$voiture->description}}
                                {{$voiture->description}}
                                {{$voiture->description}}
                            </p>
                        </div>
                        <div class="tab-pane fade show px-2" id="caracteristiques" tabindex="1">
                            <!-- <div class="lh-lg d-flex justify-content-between text-capitalize pt-2 mb-4">
                                <h5>blutoot<i class="fa-solid fa-check text-success ms-2"></i></h5>
                                <h5>wifi<i class="fa-solid fa-check text-success ms-2"></i></h5>
                                <h5>radio<i class="fa-solid fa-check text-success ms-2"></i></h5>
                                <h5>android<i class="fa-solid fa-xmark text-danger ms-2"></i></h5>
                            </div>
                            <div class="lh-lg d-flex justify-content-between text-capitalize">
                                <h5>blutoot<i class="fa-solid fa-check text-success ms-2"></i></h5>
                                <h5>wifi<i class="fa-solid fa-check text-success ms-2"></i></h5>
                                <h5>radio<i class="fa-solid fa-check text-success ms-2"></i></h5>
                                <h5>android<i class="fa-solid fa-xmark text-danger ms-2"></i></h5>
                            </div> -->
                            <table class="table table-bordered text-capitalize fs-5 mt-3 mb-0">
                                <tbody>
                                    <tr>
                                        <td class="ps-3">blutoot</td>
                                        <td class=""><i class="fa-solid fa-check text-success ps-3"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3">wifi</td>
                                        <td class=""><i class="fa-solid fa-check text-success ps-3"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3">radio</td>
                                        <td class=""><i class="fa-solid fa-check text-success ps-3"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3">android</td>
                                        <td class=""><i class="fa-solid fa-check text-success ps-3"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3">capteurs de stationnement</td>
                                        <td class=""><i class="fa-solid fa-check text-success ps-3"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3">blutoot</td>
                                        <td class=""><i class="fa-solid fa-xmark text-danger ps-3"></i></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-reservation col-12 col-lg-3">
                <div class="box-price card px-1 py-4 py-lg-4 mx-auto mb-4 mb-lg-3 w-100">
                    <h1 class="text-danger text-center fw-semibold mb-0">{{$voiture->prix_par_jour}} DH <span class="text-black-50 fw-normal">/ jour</span></h1>
                </div>
                @if ($voiture->état == "disponible")
                <div class="details-reservation card mx-auto pb-3">
                    <h2 class="text-center bg-secondary text-light py-3">Réservation</h2>
                    <form action="{{ route('details_reservation', $voiture->immatriculation )}}" class="px-2 mx-auto">
                        <div class="box-date px-1 py-3">
                            <table class="mx-auto">
                                <tr>
                                    <td class="pb-4">
                                        <label class="text-black-50 fw-semibold" for="">Date de départ :</label>
                                        <input type="date" class="p-2 mt-2 @error('date_debut') is-invalid @enderror" id="" min="<?php echo date("Y-m-d") ?>" name="date_debut" value="{{ old('date_debut') }}">
                                        @error('date_debut')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr class="pb-4">
                                    <td>
                                        <label class="text-black-50 fw-semibold" for="">Date de retour :</label>
                                        <input type="date" class="p-2 mt-2 @error('date_fin') is-invalid @enderror" id="" min="<?php echo date("Y-m-d") ?>" name="date_fin" value="{{ old('date_fin') }}">
                                        @error('date_fin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="box-check py-3 text-capitalize">
                            <h4 class="text-center mb-5">extra accessoirs</h4>
                            <table class="w-100 fw-semibold">
                                <tr class="d-flex justify-content-between border-bottom">
                                    <td class="ps-1">
                                        <input type="checkbox" class="form-check-input me-1" name="{{$accessoires[0]->name}}" value="{{$accessoires[0]->id}}" id="Gps">
                                        <label class="" for="check">{{$accessoires[0]->name}}</label>
                                    </td>
                                    <td class="pe-1 text-danger">
                                        <span class="">{{$accessoires[0]->prix}} dh</span>
                                    </td>
                                </tr>
                                <tr class="d-flex justify-content-between border-bottom mt-3">
                                    <td class="ps-1">
                                        <input type="number" class="seat" min="0" max="5" name="{{$accessoires[1]->name}}" value="{{ old($accessoires[1]->name,'0')}}" id="">
                                        <label class="" for="">{{$accessoires[1]->name}}</label>
                                    </td>
                                    <td class="pe-1 text-danger">
                                        <span class="">{{$accessoires[1]->prix}} dh / jr</span>
                                    </td>
                                </tr>
                                {{-- <tr class="d-flex justify-content-between border-bottom mt-3">
                                    <td class="ps-1">
                                        <input type="checkbox" class="form-check-input me-1" name="check2" value="gps" id="check">
                                        <label class="" for="check">wifi Access</label>
                                    </td>
                                    <td class="pe-1 text-danger">
                                        <span class="">100 Dh / jr</span>
                                    </td>
                                </tr> --}}
                            </table>
                        </div>
                        <button type="submit" class="btn bg-primary text-light fs-5 p-1 text-center mt-3 w-100 mb-3">
                            Réserver
                        </button>
                    </form>
                </div>
                @else
                <div class="details-reservation bg-warning card mx-auto">
                    <h2 class="text-center fw-bold text-danger py-3 mb-0" title="cette voiture est réserver maintenant merci de choisir autre voiture">Réserved</h2>
                @endif
            </div>
        </div>
    </div>
    <h3 class="fw-bold mb-4 py-2 text-capitalize border-bottom">similair cars</h3>
    <div class="box-similair-cars row py-2">
        @foreach ($voitures_similaires as $vs)
            <div class="box-sim-car col-9 mx-auto mx-lg-0 col-lg-4">
                <a href="{{ route('details', $vs->immatriculation )}}" class="text-decoration-none text-dark">
                    <div class="car card shadow bg-light pb-0 p-3 mb-4 h-100">
                        <div class="car-image pb-2">
                            <img class="img-fluid rounded" src="{{asset('images/'.$vs->image_path)}}" width="100%" height="100%" alt="">
                        </div>
                        <div class="car-details">
                            <div class="name-rating px-1 d-flex flex-md-column flex-xl-row justify-content-between py-2 mb-0 mb-xl-2">
                                <h4>{{$vs->marque." ".$vs->model}}</h4>
                                <h5 class="text-danger pt-1 pt-xl-1">{{$vs->prix_par_jour}} <span class="h5 text-muted">/ j</span></h5>
                            </div>
                            <div class="list-details">
                                <ul class="list-unstyled d-flex justify-content-between px-2">
                                    <li>
                                        <span class="pe-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 18S4 10 4 6s2-4 2-4h1s1 0 1 1s-1 1-1 3s3 4 3 7s-3 5-3 5m5-1c-1 0-4 2.5-4 2.5c-.3.2-.2.5 0 .8c0 0 1 1.8 3 1.8h6c1.1 0 2-.9 2-2v-1c0-1.1-.9-2-2-2h-5Z"/></svg></i></span>
                                        <span class="text-capitalize">{{$vs->places}}</span>
                                    </li>
                                    <li>
                                        <span class="pe-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><path fill="currentColor" d="M19 14h-3v2h3v-2m3 7H3V11l8-8h10a1 1 0 0 1 1 1v17M11.83 5l-6 6H20V5h-8.17Z"/></g></svg></span>
                                        <span class="text-capitalize">{{$vs->portes}}</span>
                                    </li>
                                    <li>
                                        <span class="pe-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="currentColor"><path d="M2 4a2 2 0 1 1 2.75 1.855v5.395h6.5V5.855a2 2 0 1 1 1.5 0v5.395H16c.964 0 1.612-.002 2.095-.066c.461-.063.659-.17.789-.3c.13-.13.237-.328.3-.79c.064-.482.066-1.13.066-2.094V5.855a2 2 0 1 1 1.5 0v2.197c0 .898 0 1.648-.08 2.242c-.084.628-.27 1.195-.726 1.65c-.455.456-1.022.642-1.65.726c-.594.08-1.343.08-2.242.08H12.75v5.395a2 2 0 1 1-1.5 0V12.75h-6.5v5.395a2 2 0 1 1-1.5 0V5.855A2 2 0 0 1 2 4Z"/><path fill-rule="evenodd" d="M17.25 15a.75.75 0 0 1 .75-.75h2.286c1.375 0 2.464 1.134 2.464 2.5a2.502 2.502 0 0 1-1.641 2.358l1.53 2.5a.75.75 0 1 1-1.279.784l-1.923-3.142h-.687V22a.75.75 0 0 1-1.5 0v-7Zm1.5 2.75h1.536c.518 0 .964-.433.964-1s-.446-1-.964-1H18.75v2Z" clip-rule="evenodd"/></g></svg></span>
                                        <span class="text-capitalize">{{$vs->transmission}}</span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-between px-2">
                                    <li>
                                        <span class="pe-1"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M32 64C32 28.7 60.7 0 96 0h160c35.3 0 64 28.7 64 64v192h8c48.6 0 88 39.4 88 88v32c0 13.3 10.7 24 24 24s24-10.7 24-24V222c-27.6-7.1-48-32.2-48-62V96l-32-32c-8.8-8.8-8.8-23.2 0-32s23.2-8.8 32 0l77.3 77.3c12 12 18.7 28.3 18.7 45.3V376c0 39.8-32.2 72-72 72s-72-32.2-72-72v-32c0-22.1-17.9-40-40-40h-8v144c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64zm64 16v96c0 8.8 7.2 16 16 16h128c8.8 0 16-7.2 16-16V80c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16z"/></svg></span>
                                        <span class="text-capitalize">{{$vs->type_carburant}}</span>
                                    </li>
                                    <li>
                                        <span class="pe-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M17.03 6C18.11 6 19 6.88 19 8v11c0 1.13-.89 2-1.97 2c0 .58-.47 1-1.03 1c-.5 0-1-.42-1-1H9c0 .58-.5 1-1 1c-.56 0-1.03-.42-1.03-1C5.89 21 5 20.13 5 19V8c0-1.12.89-2 1.97-2H9V3c0-.58.46-1 1-1h4c.54 0 1 .42 1 1v3h2.03M13.5 6V3.5h-3V6h3M8 9v9h1.5V9H8m6.5 0v9H16V9h-1.5m-3.25 0v9h1.5V9h-1.5Z"/></svg></span>
                                        <span class="text-capitalize">{{$vs->bagages}}</span>
                                    </li>
                                    <li>
                                        <span class="pe-1"><i class="fas fa-star filled"></i></span>
                                        <span class="text-capitalize">{{$voiture->assurance}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
            </div>  
        @endforeach
    </div>
    {{-- <div class="box-similair-cars row py-3">
        <div class="box-sim-car col-9 mx-auto mx-lg-0 col-lg-4">
            <a href="{{ route('details', $voiture->immatriculation )}}" class="text-decoration-none text-dark">
                <div class="car card shadow bg-light p-3 mb-4">
                    <div class="car-image pb-2">
                        <img class="img-fluid rounded" src="{{asset('images/car-03.jpg')}}" width="100%" alt="">
                    </div>
                    <div class="car-details">
                        <div class="name-rating px-1 d-flex flex-md-column flex-xl-row justify-content-between justify-content--between py-2 mb-0 mb-xl-2">
                            <h3>Toyota wolf</h3>
                            <h4 class="text-danger pt-1 pt-xl-1">290 <span>DH</span><span class="h5 text-muted"> / jour</span></h4>
                        </div>
                        <div class="list-details">
                            <ul class="list-unstyled d-flex justify-content-between px-2">
                                <li>
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m5 11l1.5-4.5h11L19 11m-1.5 5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5m-11 0A1.5 1.5 0 0 1 5 14.5A1.5 1.5 0 0 1 6.5 13A1.5 1.5 0 0 1 8 14.5A1.5 1.5 0 0 1 6.5 16M18.92 6c-.2-.58-.76-1-1.42-1h-11c-.66 0-1.22.42-1.42 1L3 12v8a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1h12v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-8l-2.08-6Z"/></svg></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-1">auto</span>
                                </li>
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-2">auto</span>
                                </li>
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-2">auto</span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-between px-2">
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-2">auto</span>
                                </li>
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-2">auto</span>
                                </li>
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-2">auto</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="box-sim-car col-9 mx-auto mx-lg-0 col-lg-4">
            <a href="" class="text-decoration-none text-dark">
                <div class="car card shadow bg-light p-3 mb-4">
                    <div class="car-image pb-2">
                        <img class="img-fluid rounded" src="{{asset('images/car-03.jpg')}}" width="100%" alt="">
                    </div>
                    <div class="car-details">
                        <div class="name-rating px-1 d-flex flex-column flex-xl-row justify-content-xl-between py-2 mb-0 mb-xl-2">
                            <h3>Toyota wolf</h3>
                            <h4 class="text-danger pt-1 pt-xl-1">290 <span>DH</span><span class="h5 text-muted"> / jour</span></h4>
                        </div>
                        <div class="list-details">
                            <ul class="list-unstyled d-flex justify-content-between px-2">
                                <li>
                                    <span><i class="fa-solid fa-gas-pump"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-1">essence</span>
                                </li>
                                <li>
                                    <span><i class="fa-solid fa-user"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-1">5 seats</span>
                                </li>
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-1">auto</span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-between px-2">
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-2">auto</span>
                                </li>
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-2">auto</span>
                                </li>
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-2">auto</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="box-sim-car col-9 mx-auto mx-lg-0 col-lg-4">
            <a href="" class="text-decoration-none text-dark">
                <div class="car card shadow bg-light p-3 mb-4">
                    <div class="car-image pb-2">
                        <img class="img-fluid rounded" src="{{asset('images/car-03.jpg')}}" width="100%" alt="">
                    </div>
                    <div class="car-details">
                        <div class="name-rating px-1 d-flex flex-column flex-xl-row justify-content-xl-between py-2 mb-0 mb-xl-2">
                            <h3>Toyota wolf</h3>
                            <h4 class="text-danger pt-1 pt-xl-1">290 <span>DH</span><span class="h5 text-muted"> / jour</span></h4>
                        </div>
                        <div class="list-details">
                            <ul class="list-unstyled d-flex justify-content-between px-2">
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-2">auto</span>
                                </li>
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-2">auto</span>
                                </li>
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-2">auto</span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-between px-2">
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-2">auto</span>
                                </li>
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-2">auto</span>
                                </li>
                                <li>
                                    <span><i class="fas fa-star filled"></i></span>
                                    <span class="text-capitalize ps-2 ps-md-0 ps-lg-2">auto</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div> --}}
</div>
@endsection
