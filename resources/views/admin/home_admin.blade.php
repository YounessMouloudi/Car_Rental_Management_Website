@extends('admin/dashboard')
@section('title','Dashboard Admin')
@section('content')
<div class="container" >
    <div class="px-3 py-5">
        <h1 class="pb-5 text-capitalize text-center">dashboard admin</h1>
        <div class="py-5">
            <div class="row mx-0">
                <div class="col-6 col-lg-3 mb-3">
                    <img src="{{asset('images/chart.png')}}" alt="" width="100%">
                </div>
                <div class="col-6 col-lg-3">
                    <img src="{{asset('images/chart.png')}}" alt="" width="100%">
                </div>
                <div class="col-6 col-lg-3">
                    <img src="{{asset('images/chart.png')}}" alt="" width="100%">
                </div>
                <div class="col-6 col-lg-3">
                    <img src="{{asset('images/chart.png')}}" alt="" width="100%">
                </div>
            </div>
        </div>
        <div class="card border-primary rounded py-4 px-3 text-capitalize mb-5">
            <h4 class="">Recent réservations :</h4>
            <div class="pt-2">
                <table class="table text-center table-bordered">
                    <thead>
                        <tr>                                           
                            <th scope="col">id order</th>
                            <th scope="col">nom & prenom</th>
                            <th scope="col">Model</th>
                            <th scope="col">date debut</th>
                            <th scope="col">date fin</th>
                            <th scope="col">total</th>
                            <th>état</th>
                            <th scope="col">payement</th>
                            <th scope="col">retour</th>
                            <th scope="col">pénalité</th>
                            {{-- @foreach($columns as $col)                                            
                                <th scope="col">{{$col}}</th>
                            @endforeach --}}

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $r)
                            <tr>
                                <td class="lh-lg">{{$r->id}}</td>   
                                <td>{{$r->name." ".$r->prenom}}</td>   
                                <td>{{$r->model}}</td>   
                                <td>{{$r->date_debut}}</td>   
                                <td>{{$r->date_fin}}</td>   
                                <td>{{$r->total}}</td>   
                                <td>{{$r->état}}</td>   
                                <td>{{$r->payement}}</td>   
                                <td>{{$r->retour}}</td>   
                                <td>{{$r->total_pénalité}}</td>   
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card py-4 px-3 border-primary text-capitalize">
            <h4 class="">the most booked cars</h4>
            <div class="pt-2">
                <table class="table text-center table-bordered">
                    <thead>
                        <tr>                                           
                            <th scope="col">image car</th>
                            <th scope="col">Model</th>
                            <th scope="col">marque</th>
                            <th scope="col">carburant</th>
                            <th scope="col">transmission</th>
                            <th scope="col">année</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($voitures as $v)                            
                        <tr>
                            <td class="w-50"><img src="{{ asset('images/'.$v->image_path)}}" alt="" width="30%"></td>   
                            <td>{{$v->model}}</td>   
                            <td>{{$v->marque}}</td>   
                            <td>{{$v->type_carburant}}</td>   
                            <td>{{$v->transmission}}</td>   
                            <td>{{$v->année}}</td>   
                            {{-- <td>{{$v->immatriculation}}</td>    --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection