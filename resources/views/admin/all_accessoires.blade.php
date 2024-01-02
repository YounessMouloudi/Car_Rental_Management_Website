@extends('admin/dashboard')
@section('title','All Accessoires')
@section('content')
<div class="container ">
    <div class="px-3 py-5">
        <h1 class="p-3 text-capitalize text-center mx-auto w-50">all accessoires</h1>
        <div class="box-search text-end mb-3 p-2">
            <form action="{{ route('accessoires.index') }}" method="get">
                <input type="search" class="fs-5 ps-2 pe-1" name="search" id="" value="{{request()->input('search')}}">
                <button type="submit" class="fs-5 px-3">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        @if(request()->filled('search') && $accessoires->total() == 0)
            <div class="py-5 text-center">
                <h4 class="fw-bold text-danger">{{$accessoires->total()}} résultat pour cette recherche</h4> 
            </div>
        @else
            <div class="py-5">
                @if(request()->filled('search'))
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold text-danger pt-2">{{$accessoires->total()}} résultat(s) pour cette recherche</h5> 
                        <a href="{{route('accessoires.create')}}" class="btn text-capitalize bg-primary fw-semibold text-light">nouveau accessoire</a>
                    </div>
                @else
                    <div class="text-end">
                        <a href="{{route('accessoires.create')}}" class="btn text-capitalize bg-primary fw-semibold text-light">nouveau accessoire</a>
                    </div>
                @endif
                <div class="py-3">
                    <table class="table text-center table-bordered">
                        <thead>
                            <tr>                                           
                                <th>id accessoire</th>
                                <th>nom</th>
                                <th>prix</th>
                                <th colspan="2">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accessoires as $acc)                            
                                <tr>
                                    <td class="lh-lg">{{$acc->id}}</td>   
                                    <td>{{$acc->name}}</td>   
                                    <td>{{$acc->prix}}</td>   
                                    <td>
                                        <a href="{{ route('accessoires.edit', $acc->id)}}" class="btn bg-primary rounded py-1">Update</a>   
                                    </td>
                                    <td class="w-0">
                                        {{-- <form action="{{ route('delete_accessoire', $acc->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn_annuler btn bg-info rounded py-1" onclick="return confirm('vous voulez supprimer ?')" >supprimer</button>
                                        </form> --}}
                                        <a href="{{ route('accessoires.destroy',$acc->id) }}" class="btn_annuler btn bg-primary rounded py-1" data-confirm-delete="true">supprimer</a>
                                    </td>   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">{{$accessoires->appends(request()->input())->links()}}</div>
                </div>
            </div>            
        @endif
    </div>
</div>
@endsection