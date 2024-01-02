@extends('admin/dashboard')
@section('title','Ajouter Réservation')
@section('content')
<div class="container ">
    <div class="px-3 py-5">
        <h1 class="text-capitalize text-center">ajouter nouveau réservation</h1>
        <div class="py-5">
            <form class="py-3" action="{{ route('nv_reservation')}}" method="POST" >
                @csrf
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">Clients : </h6>
                        <select name="user_id" id="" class="form-select @error('user_id') is-invalid @enderror">
                            @foreach($clients as $c)
                                <option value="{{$c->id}}" {{ $c->id === old('user_id') ? 'selected' : '' }}>{{$c->name." ".$c->prenom}}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">Voitures : </h6>
                        <select name="voiture_id" id="" class="form-select @error('voiture_id') is-invalid @enderror">
                            @foreach($voitures as $v)
                                <option value="{{$v->id}}" {{ $v->id === old('voiture_id') ? 'selected' : '' }}>{{$v->marque." ".$v->model}}</option>
                            @endforeach
                        </select>
                        @error('voiture_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">date début : </h6>
                        <input type="date" name="date_debut"  class="form-control @error('date_debut') is-invalid @enderror" min="<?php echo date("Y-m-d") ?>" value="{{ old('date_debut')}}">
                        @error('date_debut')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">date fin : </h6>
                        <input type="date" name="date_fin"  class="form-control @error('date_fin') is-invalid @enderror " min="<?php echo date("Y-m-d") ?>" value="{{ old('date_fin')}}">
                        @error('date_fin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">état</h6>
                        <input type="text" class="form-control @error('état') is-invalid @enderror" id="" name="état" value="{{ old('état')}}">
                        @error('état')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">payement</h6>
                        <input type="text" class="form-control @error('payement') is-invalid @enderror" id="" name="payement" value="{{ old('payement')}}" >
                        @error('payement')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">{{$accessoires[0]->name}} : </h6>
                        <input type="checkbox" class="form-check-input fs-4 ms-1 mt-0" name="{{$accessoires[0]->name}}" value="{{$accessoires[0]->id}}">
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">{{$accessoires[1]->name}} : </h6>
                        <input type="hidden" name="seat_child_id" value="{{$accessoires[1]->id}}">
                        <input type="number" class="form-control" min="0" max="5" name="{{$accessoires[1]->name}}" value="{{ old($accessoires[1]->name,'0')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn text-capitalize fw-semibold bg-primary px-4">ajouter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection