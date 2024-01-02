@extends('layouts.app')

@section('title','Page Contact')

{{-- @section('content') --}}
@section('content')

<link rel="stylesheet" href="{{ asset('css/contact_style.css')}}">

<div class="contact-us py-5">
    <div class="container my-5 py-5">
        <div class="box-contact d-flex flex-column text-light">
            <div class="text-center text-capitalize pt-5">
                <h2 class="py-4">contact</h2>
            </div>
            <div class="box2 text-center">
                <h4 class="py-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="map">
        <div class="row ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13191.429366287644!2d-6.59118166020164!3d34.25218366736283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda759f000000001%3A0xb0f2670fb7c990f7!2sUniversit%C3%A9%20Ibn%20Tofail!5e0!3m2!1sfr!2sus!4v1684792267323!5m2!1sfr!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="row pb-5 px-3">
        <div class="col-lg-7 mb-lg-0 mb-5">
            <div class="contact-left">
                <h3>Get in touch</h3>
                <form action="{{ route('contacterAgence')}}" methode="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-contact-field">
                                <input type="text" class="@error('full_name') is-invalid @enderror" placeholder="Your Full Name" name="full_name" value={{ old('full_name') }}>
                                @error('full_name')
                                    <span class="invalid-feedback ps-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-contact-field">
                                <input type="email" class="@error('email') is-invalid @enderror" placeholder="Email Address" name="email" value={{ old('email') }} >
                                @error('email')
                                    <span class="invalid-feedback ps-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-contact-field">
                                <select name="subject" id="" class="@error('subject') is-invalid @enderror text-capitalize fw-semibold">
                                    <option value="" class="text-muted fw-semibold">Subject</option>
                                    <option class="text-capitalize fw-semibold" value="information" @if(old('subject') == 'information') selected @endif >information</option>
                                    <option class="text-capitalize fw-semibold" value="réclamation" @if(old('subject') == 'réclamation') selected @endif >réclamation</option>
                                </select>
                                @error('subject')
                                    <span class="invalid-feedback ps-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-contact-field">
                                <input type="tel" class="@error('telephone') is-invalid @enderror" placeholder="Phone Number" name="telephone"  value={{old('telephone')}}>
                                @error('telephone')
                                    <span class="invalid-feedback ps-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="single-contact-field">
                                <textarea class="@error('message') is-invalid @enderror" placeholder="Write here your message" name="message"  maxlength="500">{{old('message')}}</textarea>
                                @error('message')
                                    <span class="invalid-feedback ps-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="single-contact-field px-1">
                                <button type="submit" class="gauto-theme-btn"><i class="fa fa-paper-plane me-2 text-white"></i> Send Message</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 ps-lg-5">
            <div class="contact-right">
                <h3>Contact information</h3>
                <div class="contact-details py-1">
                    <li class="d-flex py-2">
                        <i class="fa-solid fa-house rounded-circle me-1"></i>
                        <p class="p-2 fw-semibold">11000 Avenue Kenitra résidence fsk 25 salé</p> 
                    </li>
                    <li class="d-flex py-2">
                        <i class="fa-solid fa-phone rounded-circle me-1"></i>
                        <p class="p-2 fw-semibold">+212-66-99-99-99-99</p> 
                    </li>
                    <li class="d-flex py-2">
                        <i class="fa-solid fa-phone rounded-circle me-1"></i>
                        <p class="p-2 fw-semibold">+212-53-99-99-99-99</p> 
                    </li>
                    <li class="d-flex py-2">
                        <i class="fa-solid fa-at rounded-circle me-1"></i>
                        <p class="p-2 fw-semibold">Fsklocation@gmail.com</p> 
                    </li>
                <div class="social-links-contact py-2 px-1">
                    <h4 class="py-2">Follow Us :</h4>
                    <ul class=" list-unstyled d-flex gap-3">
                        <li>
                            <a class="d-block text-black-50" href="">
                                <i class="fa-brands fa-facebook fa-xl facebook rounded p-2"></i>
                            </a>
                        </li>
                        <li>
                            <a class="d-block text-black-50" href="">
                                <i class="fa-brands fa-instagram fa-xl instagram rounded p-2"></i>
                            </a>
                        </li>
                        <li>
                            <a class="d-block text-black-50" href="">
                                <i class="fa-brands fa-twitter fa-xl twitter p-2"></i>
                            </a>
                        </li>
                        <li>
                            <a class="d-block text-black-50" href="">
                                <i class="fa-brands fa-linkedin fa-xl linkedin p-2"></i>
                            </a>
                        </li>                    
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

