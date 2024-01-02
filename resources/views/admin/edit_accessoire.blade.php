@extends('admin/dashboard')
@section('title','Modifier Accessoire')
@section('content')
<div class="container ">
    <div class="px-3 py-5">
        <h1 class="text-capitalize text-center">modifier accessoire</h1>
        <div class="py-5">
            <form class="py-3" action="{{route('accessoires.update',$accessoire->id)}}" method="POST">
                @csrf
                @method('patch')
                <div class="row mb-3 justify-content-center mb-lg-3">
                    <div class="col-lg-4 mb-3">
                        <input type="text" class="form-control fw-semibold @error('name') is-invalid @enderror" id="" placeholder="Name" required name="name" value="{{ old('name',$accessoire->name)}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 justify-content-center mb-lg-3">
                    <div class="col-lg-4 mb-3">     
                        <input type="text" class="form-control fw-semibold @error('prix') is-invalid @enderror" id="" placeholder="Prix" required name="prix" value="{{ old('prix',$accessoire->prix)}}">
                        @error('prix')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn text-capitalize fw-semibold bg-primary px-4">update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection