@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<link rel="stylesheet" href="{{ asset('css/dashboard_style.css')}}">

<div class="dashboard container-fluid px-5">
    <div class="row py-5">
        <h2 class="dashboard-title text-center text-capitalize">Dashboard Client</h2>
    </div>
    <div class="row pb-5 pt-2">
        <div class="dashboard-profile col-lg-3 mb-4 mb-lg-0">
            <div class="card p-4 text-center">
                <div class="profile-img text-center d-flex justify-content-center align-items-center">
                    <img src="{{ asset('images/'.$client->image_path)}}" class="" width="170px" height="170px" style="" alt="">
                </div>
                <div class="profile-name pt-4 pb-3">
                    <h4 class="fw-semibold text-capitalize">{{$client->name." ".$client->prenom}}</h4>
                    <span class="text-black-50 fw-semibold">{{$client->email}}</span>
                </div>
                <div class="profile-links d-flex justify-content-center px-3 pt-3 pb-1">
                    <div class="nav flex-column nav-pills fw-semibold w-100 text-capitalize" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link py-1 mb-2 text-capitalize">
                            <a href="{{ route('dashboard.index') }}" class="text-decoration-none" aria-current="page"><i class="fa fa-home me-4"></i>home</a>
                        </button>
                        <button class="nav-link active py-1 mb-2 text-capitalize">
                            <a href="{{ route('dashboard.profile') }}" class="text-decoration-none" aria-current="page"><i class="fa fa-user ps-1 me-4"></i> profile</a>
                        </button>
                        <a class="nav-link px-3 py-1" id="logout" href="{{route('logout')}}" 
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-arrow-right-from-bracket ps-3 me-4"></i>
                            {{ __('Log out') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-details col-lg-9">
            <div class="card p-4 h-100">
                <div class="page-profile">
                        <ul class="nav nav-pills mb-3" id="pills-tab">
                            <li class="nav-item">
                                <button class="nav-link active text-capitalize px-1" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false"><h4>profile</h4></button>
                            </li>
                            <li class="nav-item">
                              <button class="nav-link text-capitalize" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true"><h4>password</h4></button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="py-3 tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <form action="{{ route('dashboard.update',$client->id )}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="row mb-3 mb-md-0 text-capitalize">
                                        <div class="col-md-6 mb-3 ">
                                            <h6 class="fw-semibold ps-1 ps-lg-1">nom : </h6>
                                            <input type="text" class="form-control"  name="name" placeholder="" value="{{ old('name', $client->name)}}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-semibold ps-1 ps-lg-1">prenom : </h6>
                                            <input type="text" class="form-control"  name="prenom" placeholder="" value="{{ old('prenom', $client->prenom)}}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mb-md-0 text-capitalize">
                                        <div class="col-md-6 mb-3">
                                            <h6 class="fw-semibold ps-1 ps-lg-1">Adresse : </h6>
                                            <input type="text" class="form-control"  name="adresse" placeholder="" value="{{ old('adresse', $client->adresse)}}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-semibold ps-1 ps-lg-1">ville : </h6>
                                            <input type="text" class="form-control"  name="ville" placeholder="" value="{{ old('ville', $client->ville)}}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mb-md-0 text-capitalize">
                                        <div class="col-md-6 mb-3">
                                            <h6 class="fw-semibold ps-1 ps-lg-1">age : </h6>
                                            <input type="text" class="form-control"  name="age" placeholder="" value="{{ old('age', $client->age)}}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-semibold ps-1 ps-lg-1">télephone : </h6>
                                            <input type="tel" class="form-control"  name="telephone" placeholder="" value="{{ old('telephone', $client->telephone)}}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mb-md-0 text-capitalize">
                                        <div class="col-md-6 mb-3">
                                            <h6 class="fw-semibold ps-1 ps-lg-1">cin : </h6>
                                            <input type="text" class="form-control"  name="cin" placeholder="" value="{{ old('cin', $client->cin)}}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-semibold ps-1 ps-lg-1">n° de permis : </h6>
                                            <input type="text" class="form-control"  name="permis" placeholder="" value="{{ old('permis', $client->permis)}}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mb-md-2 text-capitalize">
                                        <div class="col-md-6 mb-3">
                                            <h6 class="fw-semibold ps-1 ps-lg-1">image : </h6>
                                            <input type="file" class="form-control"  name="image" value="" accept="image/jpeg,image/jpg,image/png">
                                        </div>    
                                        <div class="col-md-6 mb-3 mb-md-0">
                                            <h6 class="fw-semibold ps-1 ps-lg-1">genre : </h6>
                                            <select name="genre"  class="form-select text-capitalize" required>
                                                <option value="{{ old('genre', 'homme')}}" @if( $client->genre == "homme") selected @endif>homme</option>
                                                <option value="{{ old('genre', 'femme')}}" @if( $client->genre == "femme") selected @endif>femme</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="row mb-3 mb-md-2">
                                    </div> --}}
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn text-capitalize fw-semibold px-4">update profile</button>
                                        </div>
                                    </div>    
                                </form>
                            </div>
                            <div class="py-3 tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                <form action="{{ route('dashboard.update',$client->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="row mb-3 mb-md-0 text-capitalize">
                                        <div class="col-md-6 mb-3">
                                            <h6 class="fw-semibold ps-1 ps-lg-1">email adresse : </h6>
                                            <input type="email" class="form-control" required name="email" value="{{ old('email', $client->email)}}">
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-semibold ps-1 ps-lg-1">Password : </h6>
                                            <input type="password" class="form-control" required  name="password" value="{{ old('password')}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn text-capitalize fw-semibold px-4">update password</button>
                                        </div>
                                    </div>    
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>

<script>
    function showAlert() {
        Alert.success('This is a success message!');
    }
</script> --}}
@endsection