@extends('admin/dashboard')
@section('title','All Cars')
@section('content')
<div class="container ">
    <div class="px-3 py-5">
        <h1 class="p-3 text-capitalize text-center mx-auto w-50">all cars</h1>
        <div class="box-search text-end mb-3 p-2">
            <form action="{{ route('all_cars') }}" method="get">
                <input type="search" class="fs-5 ps-2 pe-1" name="search" id="" value="{{request()->input('search')}}">
                <button type="submit" class="fs-5 px-3">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        @if(request()->filled('search') && $voitures->total() == 0)
            <div class="py-5 text-center">
                <h4 class="fw-bold text-danger">{{$voitures->total()}} résultat pour cette recherche</h4> 
            </div>
        @else
            <div class="py-5">
                @if(request()->filled('search'))
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold text-danger pt-2">{{$voitures->total()}} résultat(s) pour cette recherche</h5> 
                        <a href="{{ route('cars.create') }}" class="btn text-capitalize bg-primary fw-semibold text-light">nouveau voiture</a>
                    </div>
                @else
                    <div class="text-end">
                        <a href="{{ route('cars.create') }}" class="btn text-capitalize bg-primary fw-semibold text-light">nouveau voiture</a>
                    </div>
                @endif
                <div class="py-3">
                    <table class="table text-center table-bordered">
                        <thead>
                            <tr>                                           
                                <th scope="col">image car</th>
                                <th scope="col">model</th>
                                <th scope="col">Marque</th>
                                <th scope="col">immatriculation</th>
                                <th scope="col">année</th>
                                <th scope="col">transmission</th>
                                <th scope="col">carburant</th>
                                <th scope="col">prix</th>
                                <th>état</th>
                                <th colspan="2">actions</th>
                                {{-- @foreach($columns as $col)                                            
                                    <th scope="col">{{$col}}</th>
                                @endforeach --}}

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($voitures as $v)
                            <tr>
                                <td class="lh-lg"><img src="{{ asset('images/'.$v->image_path)}}" width="75%" alt=""></td>   
                                <td>{{$v->model}}</td>   
                                <td>{{$v->marque}}</td>   
                                <td>{{$v->immatriculation}}</td>   
                                <td>{{$v->année}}</td>   
                                <td>{{$v->transmission}}</td>   
                                <td>{{$v->type_carburant}}</td>   
                                <td>{{$v->prix_par_jour}}</td>   
                                <td>{{$v->état}}</td>   
                                <td>
                                    <a href="{{ route('cars.edit', $v->id) }}" class="btn bg-primary rounded py-1">Update</a>   
                                </td>
                                <td class="w-0">
                                    {{-- <form action="{{ route('delete_car',$v->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn_annuler btn bg-primary rounded py-1" onclick="return confirm('vous voulez supprimer ?')" >supprimer</button>
                                    </form> --}}
                                    <a href="{{ route('cars.destroy',$v->id) }}" class="btn_annuler btn bg-primary rounded py-1" data-confirm-delete="true">supprimer</a>
                                </td>   
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">{{$voitures->appends(request()->input())->links()}}</div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection