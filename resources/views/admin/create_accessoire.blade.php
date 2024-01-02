@extends('admin/dashboard')
@section('title','Ajouter Accessoire')
@section('content')
<div class="container ">
    <div class="px-3 py-5">
        <h1 class="text-capitalize text-center">ajouter nouveau accessoire</h1>
        <div class="py-5">
            <form class="py-3" action="{{route('accessoires.store')}}" method="POST">
                @csrf
                <div class="row mb-3 justify-content-center mb-lg-3">
                    <div class="col-lg-4 mb-3">
                        <input type="text" class="form-control fw-semibold @error('name') is-invalid @enderror" id="" placeholder="Name" name="name" value="{{ old('name')}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 justify-content-center mb-lg-3">
                    <div class="col-lg-4 mb-3">     
                        <input type="text" class="form-control fw-semibold @error('prix') is-invalid @enderror" id="" placeholder="Prix" name="prix" value="{{ old('prix')}}">
                        @error('prix')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn text-capitalize  fw-semibold bg-primary px-4">ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection