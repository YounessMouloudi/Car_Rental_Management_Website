@extends('admin/dashboard')
@section('title','All Clients')
@section('content')
<div class="container ">
    <div class="px-3 py-5">
        <h1 class="text-capitalize text-center">all clients</h1>
        <div class="box-search text-end mb-3 p-2">
            <form action="{{ route('all_clients') }}" method="get">
                <input type="search" class="fs-5 ps-2 pe-1" name="search" id="" value="{{request()->input('search')}}">
                <button type="submit" class="fs-5 px-3">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        @if(request()->filled('search') && $clients->total() == 0)
            <div class="py-5 text-center">
                <h4 class="fw-bold text-danger">{{$clients->total()}} résultat pour cette recherche</h4> 
            </div>
        @else
        <div class="py-5">
            @if(request()->filled('search'))
                <div class="d-flex justify-content-between">
                    <h5 class="fw-bold text-danger pt-2">{{$clients->total()}} résultat(s) pour cette recherche</h5> 
                    <a href="{{ route('create_client')}}" class="btn text-capitalize bg-primary fw-semibold text-light">nouveau client</a>
                </div>
            @else
                <div class="text-end">
                    <a href="{{ route('create_client')}}" class="btn text-capitalize bg-primary fw-semibold text-light">nouveau client</a>
                </div>
            @endif
            <div class="py-3">
                <table class="table text-center table-bordered">
                    <thead>
                        <tr>                                           
                            <th scope="col">image client</th>
                            <th scope="col">nom</th>
                            <th scope="col">prenom</th>
                            <th scope="col">email</th>
                            <th scope="col">age</th>
                            <th>telephone</th>
                            <th>ville</th>
                            <th scope="col">cin</th>
                            <th>actions</th>
                            {{-- @foreach($columns as $col)                                            
                                <th scope="col">{{$col}}</th>
                            @endforeach --}}

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr class="text-lowercase">
                                <td class="w-25"><img src="{{ asset('images/'.$client->image_path)}}" alt="" width="25%"></td>   
                                <td class="">{{$client->name}}</td>   
                                <td>{{$client->prenom}}</td>   
                                <td>{{$client->email}}</td>   
                                <td>{{$client->age}}</td>   
                                <td>{{$client->telephone}}</td>   
                                <td>{{$client->ville}}</td>
                                <td>{{$client->cin}}</td>
                                <td class="">
                                    {{-- <form action="{{ route('delete_client',$client->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn_annuler btn bg-primary rounded py-1" onclick="return confirm('vous voulez supprimer ?')" >supprimer</button>
                                    </form> --}}
                                    <a href="{{ route('delete_client',$client->id) }}" class="btn_annuler btn bg-primary rounded py-1" data-confirm-delete="true" >supprimer</a>
                                </td> 
                            </tr>
                        @endforeach  
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">{{$clients->appends(request()->input())->links()}}</div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection