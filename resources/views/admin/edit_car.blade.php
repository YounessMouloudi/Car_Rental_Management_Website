@extends('admin/dashboard')
@section('title','Modifier Voiture')
@section('content')
<div class="container ">
    <div class="px-3 py-5">
        <h1 class="text-capitalize text-center">modifier une voiture</h1>
        <div class="py-5">
            <form class="py-3" action="{{ route('cars.update',$voiture->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">model : </h6>
                        <input type="text" class="form-control" id="" name="model" required placeholder="" value="{{ old('model',$voiture->model)}}">
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">marque : </h6>
                        <select name="marque" id="" class="form-select" required>
                            @foreach($marques as $m)
                                <option value="{{$m}}" {{ $m === old('marque',$voiture->marque) ? 'selected' : '' }}>{{$m}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">immatriculation : </h6>
                        <input type="text" class="form-control" id="" name="immatriculation" required placeholder="" value="{{ old('immatriculation',$voiture->immatriculation)}}">
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">année : </h6>
                        <input type="number" class="form-control" id="" name="année" required min="2007" max="<?php echo date("Y") ?>" step="1" value="{{ old('année', $voiture->année)}}">
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">transmission</h6>
                        <select name="transmission" id="" class="form-select" required>
                            @foreach($transmissions as $t)
                                <option value="{{$t}}" {{ $t === old('transmission',$voiture->transmission) ? 'selected' : '' }}>{{$t}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">type carburant</h6>
                        <select name="type_carburant" id="" class="form-select" required>
                            @foreach($carburants as $c)
                                <option value="{{$c}}" {{ $c === old('type_carburant',$voiture->type_carburant) ? 'selected' : '' }}>{{$c}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">portes : </h6>
                        <input type="number" class="form-control" id="" name="portes" required placeholder="" min="0" max="7" value="{{ old('portes',$voiture->portes)}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">places: </h6>
                        <input type="number" class="form-control" id="" name="places" required placeholder="" min="0" max="7" value="{{ old('places',$voiture->places)}}">
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">bagages : </h6>
                        <input type="number" class="form-control" id="" name="bagages" required min="0" max="3" placeholder="" value="{{ old('bagages',$voiture->bagages)}}">
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">assurance : </h6>
                        <select name="assurance" id="" class="form-select" required>
                            @foreach($assurances as $a)
                                <option value="{{$a}}" {{ $a === old('assurance',$voiture->assurance) ? 'selected' : '' }}>{{$a}}</option>
                            @endforeach
                        </select>                  
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">prix_par_jour : </h6>
                        <input type="text" class="form-control" id="" name="prix_par_jour" required placeholder="" value="{{ old('prix_par_jour',$voiture->prix_par_jour)}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">état : </h6>
                        <select name="état" id="" class="form-select" required>
                            @foreach($états as $e)
                                <option value="{{$e}}" {{ $e === old('état',$voiture->état) ? 'selected' : '' }}>{{$e}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">pénalité : </h6>
                        <input type="text" class="form-control" id="" name="pénalité" required value="{{ old('pénalité',$voiture->pénalité)}}">
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">image car : </h6>
                        <input type="file" class="form-control" id="" name="image" value="{{ old('image',$voiture->image_path)}}" accept="image/jpeg,image/jpg,image/png">
                    </div>
                </div>
                <div class="row mb-3 mb-md-2 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">description : </h6>
                        <textarea name="description" class="form-control" id="" required cols="30" rows="3">{{ old('description',$voiture->description)}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn text-capitalize fw-semibold bg-primary px-4">update car</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection