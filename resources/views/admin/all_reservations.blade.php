@extends('admin/dashboard')
@section('title','All Réservations')
@section('content')
<div class="container ">
    <div class="px-3 py-5">
        <h1 class="text-capitalize text-center">all réservations</h1>
        <div class="box-search text-end mb-3 p-2">
            <form action="{{ route('all_reservations') }}" method="get">
                <input type="search" class="fs-5 ps-2 pe-1" name="search" id="" value="{{request()->input('search')}}">
                <button type="submit" class="fs-5 px-3">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        @if(request()->filled('search') && $reservations->total() == 0)
            <div class="py-5 text-center">
                <h4 class="fw-bold text-danger">{{$reservations->total()}} résultat pour cette recherche</h4> 
            </div>
        @else
            <div class="py-5">
                @if(request()->filled('search'))
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold text-danger pt-2">{{$reservations->total()}} résultat(s) pour cette recherche</h5> 
                        <a href="{{ route('reservations.create') }}" class="btn text-capitalize bg-primary fw-semibold text-light">nouveau réservation</a>
                    </div>
                @else
                    <div class="text-end">
                        <a href="{{ route('reservations.create') }}" class="btn text-capitalize bg-primary fw-semibold text-light">nouveau réservation</a>
                    </div>
                @endif
                <div class="py-3">
                    <table class="table text-center table-bordered text-capitalize">
                        <thead>
                            <tr>                                           
                                <th>id order</th>
                                <th>nom & prenom</th>
                                <th>Model</th>
                                <th>date debut</th>
                                <th>date fin</th>
                                <th>total</th>
                                <th>état</th>
                                <th>payement</th>
                                <th>retour</th>
                                <th>pénalité</th>
                                <th colspan="2">actions</th>
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
                                <td>
                                    <a href="{{ route('reservations.edit', $r->id) }}" class="btn bg-primary rounded py-1">Update</a>   
                                </td>
                                <td class="w-0">
                                    <a href="{{ route('reservations.destroy',$r->id) }}" class="btn_annuler btn bg-primary rounded py-1" data-confirm-delete="true">supprimer</a>
                                </td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">{{$reservations->appends(request()->input())->links()}}</div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection