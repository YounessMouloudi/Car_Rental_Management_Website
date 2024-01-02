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
                        <button class="nav-link active py-1 mb-2 text-capitalize">
                            <a href="{{ route('dashboard.index') }}" class="text-decoration-none" aria-current="page"><i class="fa fa-home me-4"></i>home</a>
                        </button>
                        <button class="nav-link py-1 mb-2 text-capitalize">
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
                <div class="page-home text-capitalize">
                    <h4 class="">mes réservations</h4>
                    <div class="table-responsive py-3">
                        <table class="table align-middle text-center table-bordered">
                            <thead>
                                <tr>                                           
                                    <th scope="col">voiture</th>
                                    <th scope="col">date debut</th>
                                    <th scope="col">date fin</th>
                                    <th scope="col">accessoires</th>
                                    <th scope="col">total</th>
                                    <th>état</th>
                                    <th scope="col">payement</th>
                                    <th scope="col">retour</th>
                                    <th scope="col">pénalité</th>
                                    <th class="text-center" colspan="2">actions</th>
                                </tr>
                            </thead>
                            <tbody class="bordered">
                                @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{$reservation["model"]." ".$reservation["marque"] }}</td>   
                                    <td>{{$reservation["date_debut"]}}</td>   
                                    <td>{{$reservation["date_fin"]}}</td>
                                    @if ($reservation['accessoires'])
                                        <td>
                                            @foreach($reservation['accessoires'] as $accessoire)
                                                {{$accessoire['name']."  (".$accessoire["quantité"].")"}}
                                            @endforeach                                      
                                        </td>   
                                    @else
                                        <td>null</td>   
                                    @endif
                                    <td>{{$reservation["total"]}}</td>   
                                    <td>{{$reservation["état"]}}</td>
                                    <td>{{$reservation["payement"]}}</td>
                                    <td>{{$reservation["retour"]}}</td>
                                    <td>{{$reservation["total_pénalité"]}}</td>
                                    <td>
                                        <a href="{{ route('suppression', $reservation['id'] ) }}" class="btn_annuler btn bg-warning px-1 rounded py-1" title="Annuler cette réservation" data-confirm-delete="true">annuler</a>
                                    </td>   
                                    <td><a href="{{ route('pdf',$reservation['id']) }}" class="btn bg-warning rounded py-1 px-1" title="Télécharger votre contrat en PDF "><i class="fa-solid fa-file-pdf"></i></a></td>   
                                    {{-- <td><a href="{{ route('pdf') }}" class="btn bg-info rounded py-1">telecharger</a></td>    --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection