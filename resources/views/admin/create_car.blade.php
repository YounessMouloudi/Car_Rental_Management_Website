@extends('admin/dashboard')
@section('title','Ajouter Car')
@section('content')
<div class="container ">
    <div class="px-3 py-5">
        <h1 class="text-capitalize text-center">ajouter nouveau voiture</h1>
        <div class="py-5">
            <form class="py-3" action="{{ route('cars.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">model : </h6>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" id="" name="model" value="{{ old('model')}}">
                        @error('model')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">marque : </h6>
                        <input type="text" class="form-control @error('marque') is-invalid @enderror" id="" name="marque" value="{{ old('marque')}}">
                        @error('marque')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">immatriculation : </h6>
                        <input type="text" class="form-control @error('immatriculation') is-invalid @enderror" id="" name="immatriculation" value="{{ old('immatriculation')}}">
                        @error('immatriculation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">année : </h6>
                        <input type="number" class="form-control @error('année') is-invalid @enderror" id="" name="année" min="2007" max="<?php echo date("Y") ?>" step="1" value="{{ old('année', 2007)}}">
                        @error('année')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">transmission</h6>
                        <input type="text" class="form-control @error('transmission') is-invalid @enderror" id="" name="transmission" value="{{ old('transmission')}}">
                        @error('transmission')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">type carburant</h6>
                        <input type="text" class="form-control @error('type_carburant') is-invalid @enderror" id="" name="type_carburant" value="{{ old('type_carburant')}}">
                        @error('type_carburant')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">portes : </h6>
                        <input type="number" class="form-control @error('portes') is-invalid @enderror" id="" name="portes" min="0" max="7" value="{{ old('portes',0)}}">
                        @error('portes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">places: </h6>
                        <input type="number" class="form-control @error('places') is-invalid @enderror" id="" name="places" min="0" max="7" value="{{ old('places',0)}}">
                        @error('places')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">bagages : </h6>
                        <input type="number" class="form-control @error('bagages') is-invalid @enderror" id="" name="bagages" min="0" max="3" value="{{ old('bagages',0)}}">
                        @error('bagages')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">état : </h6>
                        <input type="text" class="form-control @error('état') is-invalid @enderror" id="" name="état" value="{{ old('état')}}">
                        @error('état')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">prix_par_jour : </h6>
                        <input type="text" class="form-control @error('prix_par_jour') is-invalid @enderror" id="" name="prix_par_jour" value="{{ old('prix_par_jour')}}">
                        @error('prix_par_jour')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">assurance : </h6>
                        <input type="text" class="form-control @error('assurance') is-invalid @enderror" id="" name="assurance" value="{{ old('assurance')}}">
                        @error('assurance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">pénalité : </h6>
                        <input type="text" class="form-control @error('pénalité') is-invalid @enderror" id="" name="pénalité" value="{{ old('pénalité')}}">
                        @error('pénalité')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">image car : </h6>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="" name="image" value="{{ old('image') }}" accept="image/jpeg,image/jpg,image/png">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-md-2 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">description : </h6>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="3">{{ old('description')}}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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