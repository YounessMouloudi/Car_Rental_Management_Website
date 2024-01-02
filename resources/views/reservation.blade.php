@extends('layouts.app')

@section('title','Page Réservation')


@section('content')

<link rel="stylesheet" href="{{ asset('css/reservation_style.css')}}">

<div class="box-reservation container py-5">
    <div class="title-reservation pb-5 text-center">
        <h1 class="text-capitalize">réservation</h1>
    </div>
    <form action="{{ route('save',$voiture->immatriculation)}}" method="POST">
        @csrf
        <div class="details-reservation">
            <div class="row">
                <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                    <div class="part-car text-capitalize">
                        <h3 class="text-center text-white rounded bg-secondary py-3 ">car informations</h3>
                        <div class="p-3 card rounded-top">
                            <img src="{{ asset('images/'.$voiture->image_path)}}" name="image" class="img-fluid card p-1" width="100%"alt="">
                            {{-- <img src="{{ $voiture->image_path }}" name="image" class="img-fluid card p-1" width="100%"alt=""> --}}
                            <ul class="list-unstyled px-2 pt-3 pb-0 fw-normal">
                                <li class="">
                                    <h5 class="py-1 d-flex justify-content-between ">model  :<span>{{ $voiture->model }}</span></h5>
                                </li>
                                <li>
                                    <h5 class="py-1 d-flex justify-content-between">marque :<span>{{ $voiture->marque }}</span></h5>
                                </li>
                                <li>
                                    <h5 class="py-1 d-flex justify-content-between">année :<span>{{ $voiture->année }}</span></h5>
                                </li>
                                <li>
                                    <h5 class="py-1 d-flex justify-content-between">seats :<span>{{ $voiture->places }} personnes</span></h5>
                                </li>
                                <li>
                                    <h5 class="py-1 d-flex justify-content-between">transmission :<span >{{ $voiture->transmission }}</span></h5>
                                </li>
                                <li>
                                    <h5 class="py-1 d-flex justify-content-between">prix :<span> <span id="prix">{{ $voiture->prix_par_jour }}</span> dh / jour</span></h5>
                                </li>
                            </ul>
                            <hr>
                            <div class="px-2">
                                <h4 class="fw-bold">date :</h4>
                                <div class="pt-2">
                                    @if ($date_debut && $date_fin && $duration )
                                        <h5 class="d-flex justify-content-between mb-3">date départ : <span name="date_debut" class="sp_date_debut">{{$date_debut}}</span></h5>
                                        <h5 class="d-flex justify-content-between mb-3">date FIN : <span name="date_fin" class="sp_date_fin">{{$date_fin}}</span></h5>
                                        <h5 class="d-flex justify-content-between">duration : <span name="duration" class="sp_duration">{{$duration}} jours</span></h5>
                                    @else
                                        <h5 class="d-flex justify-content-between mb-3">date départ : <span name="date-dép" class="sp_date_debut">dd/mm/yyyy</span></h5>
                                        <h5 class="d-flex justify-content-between mb-3">date FIN : <span name="date-fin" class="sp_date_fin">dd/mm/yyyy</span></h5>
                                        <h5 class="d-flex justify-content-between">duration : <span name="duration" class="sp_duration">0 jours</span></h5>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="px-2">
                                <h4 class="fw-bold">accessoirs :</h4>
                                {{-- @if ($details_reservation != null)                              
                                    <div class="pt-2">
                                        @if (request()->has('gps'))
                                            <h5 class="mb-3"><span id="sp_gps">{{$details_reservation['gps']}} x</span> gps <div class="float-end"><span id="gps_prix">{{$accessoire[0]->prix}}</span><span> dh</span></div></h5>
                                        @else    
                                            <h5 class="mb-3"><span id="sp_gps">0 x</span> gps <div class="float-end"><span id="gps_prix">0</span><span> dh</span></div></h5>
                                        @endif
                                        <h5><span id="sp_seat">{{$details_reservation['seat_child']}}</span> x child seat <div class="float-end"><span id="seat_prix">{{$accessoire[1]->prix * $details_reservation['seat_child']}}</span><span> dh / j</span></div> </h5>
                                    </div>
                                @else
                                @endif --}}
                                <div class="pt-2">
                                    <h5 class="mb-3"><span class="sp_gps">0 x</span> gps <div class="float-end"><span class="gps_prix">0</span><span> dh</span></div></h5>
                                    <h5><span class="sp_seat">0</span> x child seat <div class="float-end"><span class="seat_prix">0</span><span> dh / j</span></div> </h5>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 pt-4 pb-3 text-white bg-secondary rounded-bottom">
                            @if($duration)
                                <h4 class="text-uppercase fw-bold">total  <span class="float-end total">{{$duration * $voiture->prix_par_jour}} <span>dh</span></span></h4>
                            @else
                                <h4 class="text-uppercase fw-bold">total  <span class="float-end total" >0 dh</span></h4>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="part-infos text-capitalize">
                        <h3 class="text-center card text-white bg-secondary py-3 ">details reservations</h3>
                        <div class="card p-3">
                            <div class="reservation-date text-capitalize">
                                <h4>date informations :</h4>
                                <div class="row py-2">
                                    <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                        <h5 class="mb-3">pick up date :</h5>
                                        @if( $details_reservation != null )
                                            <input type="date" name="date_debut" class="form-control date_debut @error('date_debut') is-invalid @enderror w-100" min="<?php echo date("Y-m-d") ?>" value="{{ $details_reservation["date_debut"] }}">
                                            @error('date_debut')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @else
                                            <input type="date" name="date_debut"  class="form-control date_debut @error('date_debut') is-invalid @enderror w-100" min="<?php echo date("Y-m-d") ?>" value="{{ old('date_debut')}}">
                                            @error('date_debut')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif    
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <h5 class="mb-3">pick up date :</h5>
                                        @if( $details_reservation != null )
                                            <input type="date" name="date_fin" class="form-control date_fin  @error('date_fin') is-invalid @enderror w-100" min="<?php echo date("Y-m-d") ?>" value="{{ $details_reservation["date_fin"] }}">
                                            @error('date_fin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                
                                        @else
                                            <input type="date" name="date_fin" class="form-control date_fin @error('date_fin') is-invalid @enderror w-100" min="<?php echo date("Y-m-d") ?>" value="{{ old('date_fin')}}">
                                            @error('date_fin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif    
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="reservation-extra">
                                <h4>extra accessoirs : </h4>
                                <div class="row py-2">
                                    <div class=".col-12 col-lg-6">
                                        <div class="d-flex w-100 justify-content-between fs-5 px-1">
                                            @if(request()->has('gps'))
                                                <div class="mb-3 mb-lg-0">
                                                    <input type="checkbox" class="form-check-input gps me-1" name="{{$accessoire[0]->name}}" checked value="{{ $details_reservation["gps"]}}" id="Gps">
                                                    <label class="" for="Gps">{{$accessoire[0]->name}}</label>
                                                </div>
                                                <span class="acc1" value="{{$accessoire[0]->prix}}">{{$accessoire[0]->prix}} dh</span>
                                            @else
                                                <div class="mb-3 mb-lg-0">
                                                    <input type="checkbox" class="form-check-input gps me-1" name="{{$accessoire[0]->name}}" value="{{$accessoire[0]->id}}" id="Gps">
                                                    <label class="" for="Gps">{{$accessoire[0]->name}}</label>
                                                </div>
                                                <span class="acc1" value="{{$accessoire[0]->prix}}">{{$accessoire[0]->prix}} dh</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=".col-12 col-lg-6">
                                        <div class="d-flex w-100 justify-content-between fs-5 px-1">
                                            @if($details_reservation != null)
                                                <div class="">    
                                                    <input type="hidden" name="seat_child_id" value="{{$accessoire[1]->id}}">
                                                    <input type="number" class="w-25 seat" min="0" max="5" name="{{$accessoire[1]->name}}" value="{{ old($accessoire[1]->name,$details_reservation['seat_child'])}}" id="">
                                                    <label class="" for="child_seat">{{$accessoire[1]->name}}</label>
                                                </div>
                                                <span class="acc2" value="{{$accessoire[1]->prix}}">{{$accessoire[1]->prix}} dh / jour</span>
                                            @else
                                                <div class="">    
                                                    <input type="hidden" name="seat_child_id" value="{{$accessoire[1]->id}}">
                                                    <input type="number" class="w-25 seat" min="0" max="5" name="{{$accessoire[1]->name}}" value="{{ old($accessoire[1]->name,'0')}}" id="">
                                                    <label class="" for="child_seat">{{$accessoire[1]->name}}</label>
                                                </div>
                                                <span class="acc2" value="{{$accessoire[1]->prix}}">{{$accessoire[1]->prix}} dh / jour</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row py-2">
                                    <div class=".col-12 col-lg-6">
                                        <div class="d-flex w-100 justify-content-between fs-5 px-1">
                                            <div class="mb-3 mb-lg-0">
                                                <input type="checkbox" class="form-check-input me-1" name="{{$accessoire[2]->name}}" value="{{$accessoire[2]->id}}" id="cable_usb">
                                                <label class="" for="cable_usb">{{$accessoire[2]->name}}</label>
                                            </div>
                                            <span>{{$accessoire[2]->prix}} dh / jour</span>
                                        </div>
                                    </div>
                                    <div class=".col-12 col-lg-6">
                                        <div class="d-flex w-100 justify-content-between fs-5 px-1">
                                            <div class="">
                                                <input type="checkbox" class="form-check-input me-1" name="{{$accessoire[3]->name}}" value="{{$accessoire[3]->id}}" id="Portes-bagages">
                                                <label class="" for="Portes-bagages">{{$accessoire[3]->name}}</label>
                                            </div>
                                            <span>{{$accessoire[3]->prix}} dh / jour</span>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <hr>
                            <div class="reservation-client">
                                <h4>client informations : </h4>
                                {{-- @if ($client) --}}
                                    <div class="row py-2">
                                        <div class="col-md-6 col-12 mb-3">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" required value="{{old('name',$client->name)}}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <input type="text" class="form-control @error('prenom') is-invalid @enderror" placeholder="Prénom" name="prenom" required value="{{ old('prenom',$client->prenom)}}">
                                            @error('prenom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6 col-12 mb-3">
                                            <input type="text" class="form-control @error('adresse') is-invalid @enderror" placeholder="Adresse" name="adresse" required value="{{ old('adresse',$client->adresse)}}">
                                            @error('adresse')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <input type="text" class="form-control @error('ville') is-invalid @enderror" placeholder="Ville" name="ville" required value="{{ old('ville',$client->ville)}}">
                                            @error('ville')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6 col-12 mb-3">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email Adresse" name="email" required value="{{ old('email',$client->email)}}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <input type="tel" class="form-control @error('tel') is-invalid @enderror" placeholder="Phone" name="tel" required value="{{ old('telephone',$client->telephone)}}">
                                            @error('tel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6 col-12 mb-3">
                                            <input type="text" class="form-control @error('cin') is-invalid @enderror" placeholder="CIN" name="cin" required value="{{ old('cin',$client->cin)}}">
                                            @error('cin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <input type="text" class="form-control @error('permis') is-invalid @enderror" placeholder="N° Permis" name="permis" required value="{{ old('permis',$client->permis)}}">
                                            @error('permis')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6 col-12 mb-3">
                                            <input type="text" class="form-control @error('age') is-invalid @enderror" placeholder="Age" required value="{{ old('age',$client->age)}}">
                                            @error('age')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <select name="genre" id="" class="form-select @error('genre') is-invalid @enderror" required>
                                                <option value="homme" @if( old('genre',$client->genre) == "homme") selected @endif>homme</option>
                                                <option value="femme" @if( old('genre',$client->genre) == "femme") selected @endif>femme</option>
                                            </select>
                                            @error('genre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                {{-- @else
                                    <div class="row py-2">
                                        <div class="col-md-6 col-12 mb-3">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" required value="{{ old('name')}}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <input type="text" class="form-control @error('prenom') is-invalid @enderror" placeholder="Prénom" name="prenom" required value="{{ old('prenom')}}">
                                            @error('prenom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6 col-12 mb-3">
                                            <input type="text" class="form-control @error('adresse') is-invalid @enderror" placeholder="Adresse" name="adresse" required value="{{ old('adresse')}}">
                                            @error('adresse')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <input type="text" class="form-control @error('ville') is-invalid @enderror" placeholder="Ville" name="ville" required value="{{ old('ville')}}">
                                            @error('ville')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6 col-12 mb-3">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email Adresse" name="email" required value="{{ old('email')}}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <input type="tel" class="form-control @error('tel') is-invalid @enderror" placeholder="Phone" name="tel" required value="{{ old('tel')}}">
                                            @error('tel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6 col-12 mb-3">
                                            <input type="text" class="form-control @error('cin') is-invalid @enderror" placeholder="CIN" name="cin" required value="{{ old('cin')}}">
                                            @error('cin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <input type="text" class="form-control @error('permis') is-invalid @enderror" placeholder="N° Permis" name="permis" required value="{{ old('permis')}}">
                                            @error('permis')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6 col-12 mb-3">
                                            <input type="text" class="form-control @error('age') is-invalid @enderror" placeholder="age" required value="{{ old('age')}}">
                                            @error('age')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <select name="genre" id="" class="form-select @error('genre') is-invalid @enderror" required>
                                                <option value="homme" @if( old('genre') == "homme") selected @endif>homme</option>
                                                <option value="femme" @if( old('genre') == "femme") selected @endif>femme</option>
                                            </select>
                                            @error('genre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif --}}
                            </div>
                            <hr>
                            <div class="reservation-payement">
                                <h4>Payements Méthodes:</h4>
                                {{-- <div class="row py-2">
                                    <div class="col-12">
                                        <a href="#paypal" data-bs-toggle="collapse">paypal</a>
                                        <select name="payement" id="" class="form-select">
                                            <option value="">choose une methode payement</option>
                                            <option value="paypal">Paypal</option>
                                            <option value="visacard">visa card</option>
                                            <option value="cheque">cheque</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-12">
                                        <div class="collapse paypal" id="paypal">
                                            <div class="card card-body">
                                                Lorem ipsum dolor,voluptates laudantium ipsum consequatur dolorum blanditiis magni.
                                            </div>
                                        </div>
                                        <div class="collapse visacard" id="visacard">
                                            <div class="card card-body">
                                                Lorem ipsum dolor,voluptates laudantium ipsum consequatur dolorum blanditiis magni.
                                            </div>
                                        </div>
                                        <div class="collapse cheque" id="cheque">
                                            <div class="card card-body">
                                                Lorem ipsum dolor,voluptates laudantium ipsum consequatur dolorum blanditiis magni.
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <hr>
                            <div class="reservation-button py-2">
                                <div class="row">
                                    <div class="col-12 col-lg-6 fs-5 mt-1">
                                        <label for="accept" class="mb-3">
                                            <input type="checkbox" class="form-check-input @error('accept') is-invalid @enderror" name="accept" required id="accept">
                                            <span class="ms-2 fw-bold">j'ai lu et j'accepte l'accord</span>
                                        </label>
                                        @error('accept')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-6 fs-5 ps-2 ps-lg-4">
                                        <button type="submit" class="btn bg-primary w-100 text-light px-2">Réserver</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="fs-5 ps-4">
                <button type="submit" class="btn bg-primary w-100 text-light px-2">Réserver</button>
            </div> --}}
        </div>
    </form>
</div>
@endsection