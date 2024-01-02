@extends('admin/dashboard')
@section('title','Ajouter Client')
@section('content')
<div class="container ">
    <div class="px-3 py-5">
        <h1 class="text-capitalize text-center">ajouter nouveau client</h1>
        <div class="py-5">
            <form class="py-3" action="{{route('store_client')}}" method="POST">
                @csrf
                <div class="row mb-3 mb-lg-3">
                    <div class="col-lg-6 mb-3">
                        <input type="text" class="form-control fw-semibold @error('name') is-invalid @enderror" id="" placeholder="Name" name="name" value="{{ old('name')}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6">     
                        <input type="text" class="form-control fw-semibold @error('prenom') is-invalid @enderror" id="" placeholder="Prénom" name="prenom" value="{{ old('prenom')}}">
                        @error('prenom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-lg-3">
                    <div class="col-lg-6 mb-3">
                        <input type="email" class="form-control fw-semibold @error('email') is-invalid @enderror" id="" placeholder="Email Adresse" name="email" value="{{ old('email')}}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <input type="password" class="form-control fw-semibold @error('password') is-invalid @enderror" id="" placeholder="Password" name="password" value="{{ old('password')}}">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-lg-3">
                    <div class="col-lg-6 mb-3">
                        <input type="text" class="form-control fw-semibold @error('age') is-invalid @enderror" id="" placeholder="Age" name="age" minlength="2" maxlength="2" value="{{ old('age')}}">
                        @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control fw-semibold @error('adresse') is-invalid @enderror" id="" placeholder="Adresse" name="adresse" value="{{ old('adresse')}}">
                        @error('adresse')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-lg-3">
                    <div class="col-lg-6 mb-3">
                        <input type="text" class="form-control fw-semibold @error('ville') is-invalid @enderror" id="" placeholder="Ville" name="ville" value="{{ old('ville')}}">
                        @error('ville')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <input type="tél" class="form-control fw-semibold @error('telephone') is-invalid @enderror" id="" placeholder="Télephone" name="telephone" minlength="10" maxlength="10" value="{{ old('telephone')}}">
                        @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-lg-3">
                    <div class="col-lg-6 mb-3">
                        <input type="text" class="form-control fw-semibold @error('cin') is-invalid @enderror" id="" placeholder="CIN" name="cin" value="{{ old('cin')}}">
                        @error('cin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control fw-semibold @error('permis') is-invalid @enderror" id="" placeholder="N° permis" name="permis" value="{{ old('permis')}}">
                        @error('permis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 mb-lg-3">
                    <div class="col-lg-6 mb-3">
                        <select name="genre" id="" class="form-select text-capitalize fw-semibold @error('genre') is-invalid @enderror">
                            <option class="" value="" >genre</option>
                            <option class="fw-semibold" value="{{ old('genre','homme')}}" {{ 'homme' === old('genre') ? 'selected' : '' }}>homme</option>
                            <option class="fw-semibold" value="{{ old('genre','femme') }}" {{ 'femme' === old('genre') ? 'selected' : '' }}>femme</option>
                        </select>
                        @error('genre')
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
            </form>
        </div>
    </div>
</div>
@endsection