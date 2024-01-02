@extends('layouts.app')

@section('title','Page Voitures')

@section('content')

<link rel="stylesheet" href="{{ asset('css/voitures_style.css')}}">

<div class="all-cars">
    <div class="cars">
        <div class="box-cars d-flex justify-content-center">
            <div class="text-light text-center">
                <h2 class="fw-semibold">All Cars</h2>
                <h4 class="py-5">Lorem ipsum dolor sit amet consectetur adipisicing</h4>
            </div>
        </div>
    </div>
    <!-- <div class="cars py-5">
        <div class="container py-5">
            <div class="box-cars d-flex flex-column text-light">
                <div class="cars-title text-center text-capitalize pt-5">
                    <h2 class="py-4">All Cars</h2>
                </div>
                <div class="cars-title2 text-center">
                    <h4 class="py-3">Lorem ipsum dolor sit amet consectetur adipisicing</h4>
                </div>
            </div>
        </div>
    </div> -->
</div>
<div class="container pt-5 pb-3">
    <div class="search px-2 pt-2 pb-5">
        {{-- <form class="px-5" action="/search_voitures" methode="POST">
            <div class="row py-3 py-md-2 p-lg-3 bg-white rounded border shadow">
                <div class="col-md-3">
                    <select id="" class="card fw-semibold mb-3 py-1 px-3 mb-md-0 px-md-3 w-100" name="marque">
                        <option value="" class="fw-semibold text-muted">Marques</option>
                        @foreach($marques as $marque)
                            <option value="{{$marque}}" @if( request()->marque == $marque) selected @endif >{{$marque}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select id="" class="card fs-5 mb-3 py-1 px-3 mb-md-0 py-md-0 px-md-3 w-100" name="carburant">
                        <option value="" selected class="text-muted">type_carburant</option>
                        @foreach($carburant as $c)
                            <option value="{{$c}}" @if( request()->carburant == $c) selected @endif >{{$c}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select id="" class="card fs-5 mb-3 py-1 px-3 mb-md-0 py-md-0 px-md-3 w-100" name="transmission">
                        <option value="" selected class="text-muted">transmission</option>
                        @foreach($transmission as $t)
                            <option value="{{$t}}" @if( request()->transmission == $t) selected @endif >{{$t}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn search-button text-light fs-5 py-1 px-3 mb-md-0 py-md-0 px-md-3 w-100" type="submit">
                        <i class="fa-solid fa-magnifying-glass fa-sm px-3 px-md-0 px-lg-3 d-inline d-md-none d-lg-inline "></i>Rechercher
                    </button>
                </div>
            </div>
        </form> --}}
    </div>
</div>
@if (request()->input())
    <div class="container">
        <div class="row pb-2">
            <div class="col-lg-3"></div>
            @if(request()->input("marque") && (!request()->input("carburant") && !request()->input("transmission") && !request()->input("prix")) )
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->marque}}"</h5>
                </div>

            @elseif(request()->input("carburant") && (!request()->input("marque") && !request()->input("transmission") && !request()->input("prix")))
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->carburant}}"</h5>
                </div>

            @elseif(request()->input("transmission") && (!request()->input("marque") && !request()->input("carburant") && !request()->input("prix")))
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->transmission}}"</h5>
                </div>

            @elseif(request()->input("prix") && (!request()->input("marque") && !request()->input("carburant") && !request()->input("transmission")))
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->prix}}"</h5>
                </div>

            @elseif(request()->input("marque") && request()->input("carburant") && (!request()->input("transmission") && !request()->input("prix")))
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->marque}}" and "{{request()->carburant}}"</h5>
                </div>

            @elseif(request()->input("marque") && request()->input("transmission") && (!request()->input("carburant") && !request()->input("prix")))
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->marque}}" and "{{request()->transmission}}"</h5>
                </div>

            @elseif(request()->input("marque") && request()->input("prix") && (!request()->input("carburant") && !request()->input("transmission")))
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->marque}}" and "{{request()->prix}}"</h5>
                </div>

            @elseif(request()->input("carburant") && request()->input("transmission") && (!request()->input("marque") && !request()->input("prix")))
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->carburant}}" and "{{request()->transmission}}"</h5>
                </div>

            @elseif(request()->input("carburant") && request()->input("prix") && (!request()->input("marque") && !request()->input("transmission")))
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->carburant}}" and "{{request()->prix}}"</h5>
                </div>

            @elseif(request()->input("prix") && request()->input("transmission") && (!request()->input("marque") && !request()->input("carburant")))
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->prix}}" and "{{request()->transmission}}"</h5>
                </div>

            @elseif(request()->input("marque") && request()->input("carburant") && request()->input("transmission") && !request()->input("prix"))
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->marque}}" and "{{request()->carburant}}" and "{{request()->transmission}}"</h5>
                </div>

            @elseif(request()->input("marque") && request()->input("carburant") && request()->input("prix") && !request()->input("transmission"))
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->marque}}" and "{{request()->carburant}}" and "{{request()->prix}}"</h5>
                </div>

            @elseif(request()->input("marque") && request()->input("prix") && request()->input("transmission") && !request()->input("carburant"))
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->marque}}" and "{{request()->prix}}" and "{{request()->transmission}}"</h5>
                </div>

            @elseif(request()->input("prix") && request()->input("carburant") && request()->input("transmission") && !request()->input("marque"))
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->prix}}" and "{{request()->carburant}}" and "{{request()->transmission}}"</h5>
                </div>

            @else
                <div class="col-lg-9">
                    <h5 class=""><span class="fw-bold text-danger">{{$voitures->total()}}</span> résultat(s) pour la recherche "{{request()->marque}}" and "{{request()->carburant}}" and "{{request()->transmission}}" and "{{request()->prix}}"</h5>
                </div>
            @endif
        </div>
    </div>
@endif
<div class="container pb-5">
    <div class="box-all-cars mb-4">
        <div class="row px-3 px-lg-1 pb-5">
            <div class="col-lg-3 mb-4 pe-lg-3 px-0">
                <div class="box-filter card shadow">
                    <div class="filter">
                        <h4 class="text-center py-2 px-2">Filter</h4>
                        {{-- <div class="px-2 py-2">
                            <form oninput="result.value = slider.value" class="px-1">
                                <h5 class="text-center text-lg-start py-1 fw-semibold">Select Price</h5>
                                <input type="range" class="py-1 w-100" id="slider" min="{{$prix_min}}" max="{{$prix_max}}" step="5" value="{{$prix_min}}"> <br />
                                <h5 class="text-center text-lg-start fw-semibold">The Price is <output name="result" for="slider">{{$prix_min}}</output> DH</h5>
                            </form>
                        </div> --}}
                    </div>
                    <form class="" action="/search_voitures" methode="get">
                        <div class="row pt-4 pb-2 px-3">
                            <div class="col-12 mb-4">
                                <select id="" class="card select fw-semibold text-capitalize mb-3 py-1 px-3 mb-md-0 px-md-3 w-100" name="prix">
                                    <option value="" class="fw-semibold text-muted" selected>Prix</option>
                                    @foreach($prix as $p)
                                        <option value="{{$p}}" @if( request()->prix == $p) selected @endif >{{$p}}</option>
                                    @endforeach        
                                </select>
                            </div>
                            <div class="col-12 mb-4">
                                <select id="" class="card select fw-semibold text-capitalize mb-3 py-1 px-3 mb-md-0 px-md-3 w-100" name="marque">
                                    <option value="" class="fw-semibold text-muted" selected>Marques</option>
                                    @foreach($marques as $marque)
                                        <option value="{{$marque}}" @if( request()->marque == $marque) selected @endif >{{$marque}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-4">
                                <select id="" class="card select fw-semibold text-capitalize mb-3 py-1 px-3 mb-md-0 px-md-3 w-100" name="transmission">
                                    <option value="" class="fw-semibold text-muted" selected>transmission</option>
                                    @foreach($transmission as $t)
                                        <option value="{{$t}}" @if( request()->transmission == $t) selected @endif >{{$t}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-4">
                                <select id="" class="card select fw-semibold text-capitalize mb-3 py-1 px-3 mb-md-0 px-md-3 w-100" name="carburant">
                                    <option value="" class="fw-semibold text-muted" selected>types de carburants</option>
                                    @foreach($carburant as $c)
                                        <option value="{{$c}}" @if( request()->carburant == $c) selected @endif >{{$c}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-lg-12 text-lg-center mb-2">
                                <button type="submit" class="btn bg-primary text-light fs-5 mb-lg-2 w-100 py-0">Filter by</button>
                            </div>
                            <div class="col-6 col-lg-12 text-lg-center mb-4">
                                <button type="reset" class="btn bg-primary btn_reset text-light fs-5 mb-lg-2 w-100 py-0">Reset Filter</button>    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    @foreach ($voitures as $voiture)
                        <div class="box-car card mb-3 shadow pe-0">
                            <div class="px-0 px-md-1 pe-md-0 d-flex">
                                <div class="d-flex py-3">
                                    <img class="img-fluid p-1 card" src="{{ asset('images/'.$voiture->image_path) }}" width="320px" height="200px" alt="">
                                    <div class="détails-car d-flex flex-column justify-content-between w-50 px-lg-2 px-2">
                                        <div class="title-car mt-3 d-flex justify-content-between">
                                            <h6 class="fs-4 fw-semibold text-capitalize">{{$voiture->marque." ".$voiture->model }}</h6>
                                            <h5 class="pt-1">{{$voiture->année}}</h5>
                                        </div>
                                        <div class="pt-3">
                                            <p class="">{{ Str::limit($voiture->description,90,'') }}</p>
                                        </div>
                                        <div class="list-details pt-2">
                                            <ul class="list-unstyled d-flex justify-content-between">
                                                <li title="Places">
                                                    <span class="pe-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 18S4 10 4 6s2-4 2-4h1s1 0 1 1s-1 1-1 3s3 4 3 7s-3 5-3 5m5-1c-1 0-4 2.5-4 2.5c-.3.2-.2.5 0 .8c0 0 1 1.8 3 1.8h6c1.1 0 2-.9 2-2v-1c0-1.1-.9-2-2-2h-5Z"/></svg></i></span>
                                                    <span class="text-capitalize">{{$voiture->places}}</span>
                                                </li>
                                                <li title="Portes">
                                                    <span class="pe-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><path fill="currentColor" d="M19 14h-3v2h3v-2m3 7H3V11l8-8h10a1 1 0 0 1 1 1v17M11.83 5l-6 6H20V5h-8.17Z"/></g></svg></span>
                                                    <span class="text-capitalize">{{$voiture->portes}}</span>
                                                </li>
                                                <li title="Transmission">
                                                    <span class="pe-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="currentColor"><path d="M2 4a2 2 0 1 1 2.75 1.855v5.395h6.5V5.855a2 2 0 1 1 1.5 0v5.395H16c.964 0 1.612-.002 2.095-.066c.461-.063.659-.17.789-.3c.13-.13.237-.328.3-.79c.064-.482.066-1.13.066-2.094V5.855a2 2 0 1 1 1.5 0v2.197c0 .898 0 1.648-.08 2.242c-.084.628-.27 1.195-.726 1.65c-.455.456-1.022.642-1.65.726c-.594.08-1.343.08-2.242.08H12.75v5.395a2 2 0 1 1-1.5 0V12.75h-6.5v5.395a2 2 0 1 1-1.5 0V5.855A2 2 0 0 1 2 4Z"/><path fill-rule="evenodd" d="M17.25 15a.75.75 0 0 1 .75-.75h2.286c1.375 0 2.464 1.134 2.464 2.5a2.502 2.502 0 0 1-1.641 2.358l1.53 2.5a.75.75 0 1 1-1.279.784l-1.923-3.142h-.687V22a.75.75 0 0 1-1.5 0v-7Zm1.5 2.75h1.536c.518 0 .964-.433.964-1s-.446-1-.964-1H18.75v2Z" clip-rule="evenodd"/></g></svg></span>
                                                    <span class="text-capitalize">{{$voiture->transmission}}</span>
                                                </li>
                                            </ul>
                                            <ul class="list-unstyled d-flex justify-content-between">
                                                <li title="Carburant">
                                                    <span class="pe-1"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M32 64C32 28.7 60.7 0 96 0h160c35.3 0 64 28.7 64 64v192h8c48.6 0 88 39.4 88 88v32c0 13.3 10.7 24 24 24s24-10.7 24-24V222c-27.6-7.1-48-32.2-48-62V96l-32-32c-8.8-8.8-8.8-23.2 0-32s23.2-8.8 32 0l77.3 77.3c12 12 18.7 28.3 18.7 45.3V376c0 39.8-32.2 72-72 72s-72-32.2-72-72v-32c0-22.1-17.9-40-40-40h-8v144c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64zm64 16v96c0 8.8 7.2 16 16 16h128c8.8 0 16-7.2 16-16V80c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16z"/></svg></span>
                                                    <span class="text-capitalize">{{$voiture->type_carburant}}</span>
                                                </li>
                                                <li title="Bagages">
                                                    <span class="pe-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M17.03 6C18.11 6 19 6.88 19 8v11c0 1.13-.89 2-1.97 2c0 .58-.47 1-1.03 1c-.5 0-1-.42-1-1H9c0 .58-.5 1-1 1c-.56 0-1.03-.42-1.03-1C5.89 21 5 20.13 5 19V8c0-1.12.89-2 1.97-2H9V3c0-.58.46-1 1-1h4c.54 0 1 .42 1 1v3h2.03M13.5 6V3.5h-3V6h3M8 9v9h1.5V9H8m6.5 0v9H16V9h-1.5m-3.25 0v9h1.5V9h-1.5Z"/></svg></span>
                                                    <span class="text-capitalize">{{$voiture->bagages}}</span>
                                                </li>
                                                <li title="Assurance">
                                                    <span><i class="fas fa-star filled"></i></span>
                                                    <span class="text-capitalize">{{$voiture->assurance}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="boo w-50 py-2 px-2">
                                    <div class="cars-button d-flex flex-column pt-3 pt-lg-3 pb-2 px-1">
                                        <h3 class="mt-2 pb-5 fw-bold text-danger text-center">{{$voiture->prix_par_jour}} Dh <span class="">/ jour</span></h3>
                                        <a href="{{ route('details', $voiture->immatriculation )}}" class="btn text-decoration-none py-1 bg-primary mt-3 mb-4">Détails</a>
                                        @if ($voiture->état == "disponible")
                                            <a href="{{ route('reservation', $voiture->immatriculation )}}" id="#btn_reservation" class="btn text-decoration-none mt-2 bg-primary py-1">Réserver</a> 
                                            @error('error')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                            @enderror                                           
                                        @else
                                            <h5 class="mt-2 text-center fs-6 rounded-pill badge text-bg-warning">Réserved</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach                    
                </div>
            </div>
        </div>
        <div class="">
           {{ $voitures->links()}}
        </div>
    </div>
</div>
<script>
    var resetButton = document.querySelector('.btn_reset');

    resetButton.addEventListener('click', function() {

        var selectElements = document.querySelectorAll('select');
        
        selectElements.forEach(function(selectElement) {
            if (selectElement.selectedIndex != 0) {
                selectElement.options[selectElement.selectedIndex].removeAttribute('selected');
            }
        });
    });
</script>
@endsection