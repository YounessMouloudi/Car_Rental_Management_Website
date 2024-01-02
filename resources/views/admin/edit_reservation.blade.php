@extends('admin/dashboard')
@section('title','Modifier Réservation')
@section('content')
<div class="container ">
    <div class="px-3 py-5">
        <h1 class="text-capitalize text-center">modifier une reservation</h1>
        <div class="py-5">
            <form class="py-3" action="{{ route('reservations.update',$reservation->id)}}" method="POST">
                @csrf
                @method('patch')
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">total : </h6>
                        <input type="text" class="form-control" id="" name="total" placeholder="Total" required value="{{ old('total',$reservation->total)}}">
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">état : </h6>
                        <input type="text" class="form-control" name="état" placeholder="état" required value="{{ old('état', $reservation->état)}}">
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">payement : </h6>
                        <input type="text" class="form-control"  name="payement" placeholder="Payement" required value="{{ old('payement',$reservation->payement)}}">
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-semibold ps-1 ps-lg-1">retour: </h6>
                        <input type="text" class="form-control"  name="retour" placeholder="Retour" required value="{{ old('retour',$reservation->retour)}}">
                    </div>
                </div>
                <div class="row mb-3 mb-md-0 text-capitalize">
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-semibold ps-1 ps-lg-1">pénalité : </h6>
                        <input type="text" class="form-control"  name="pénalité" placeholder="Pénalité" required value="{{ old('pénalité',$reservation->total_pénalité)}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn text-capitalize fw-semibold bg-primary px-4">update réservation</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection