<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('images/icone_voiture.png')}}"/>
    <title>{{ config('title', 'Register') }}</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* body {
            background-image:url("images/slide02.jpg");
            background-repeat:no-repeat; 
            background-size:cover;
            min-height: calc(100vh - 78px);
            background-position: center;
        } */
        .container .row .col-md-8 .card-header {
            background-color:var(--main-color);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h2 class="text-center text-l-start pt-3 pb-5">Don't have an account ? Register now.</h2>
        <div class="row justify-content-center justify-content-l-start mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-light text-center fs-5">{{ __('Register') }}</div>
    
                    <div class="card-body text-capitalize">
                        <h3 class="text-center pt-3 pb-4">nouveau client</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="genre" class="col-md-4 col-form-label text-md-end">{{ __('genre') }}</label>
    
                                <div class="col-md-6">
                                    <select id="genre" class="form-select form-control fw-semibold @error('genre') is-invalid @enderror" name="genre" value="{{ old('genre') }}" required autocomplete="genre">
                                        <option value="homme" selected>Homme</option>
                                        <option value="femme">Femme</option>
                                    </select>
    
                                    @error('genre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control fw-semibold @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="prenom" class="col-md-4 col-form-label text-md-end text">{{ __('prenom') }}</label>
    
                                <div class="col-md-6">
                                    <input id="prenom" type="text" class="form-control fw-semibold @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom">
    
                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control fw-semibold @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="aziz@gmail.com" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control fw-semibold @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <!-- <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>-->
    
                            <div class="row mb-3">
                                <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('age') }}</label>
    
                                <div class="col-md-6">
                                    {{-- <h6 class="text-lowercase" style="font-size: 10px">Votre age doit etre plus ou égale 23</h6> --}}
                                    <input id="age" type="text" class="form-control @error('age') fw-semibold is-invalid @enderror" name="age" value="{{ old('age') }}" minlength="2" maxlength="2" required autocomplete="age">
    
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="adresse" class="col-md-4 col-form-label text-md-end">{{ __('adresse') }}</label>
    
                                <div class="col-md-6">
                                    <input id="adresse" type="text" class="form-control fw-semibold @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse">
    
                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ville" class="col-md-4 col-form-label text-md-end">{{ __('ville') }}</label>
    
                                <div class="col-md-6">
                                    <input id="ville" type="text" class="form-control fw-semibold @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville">
    
                                    @error('ville')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telephone" class="col-md-4 col-form-label text-md-end">{{ __('tél') }}</label>
    
                                <div class="col-md-6">
                                    <input id="tél" type="tel" class="form-control fw-semibold @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" placeholder="Ex : 0610101010" minlength="10" maxlength="10" required autocomplete="telephone">
    
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="cin" class="col-md-4 col-form-label text-md-end">{{ __('CIN') }}</label>
    
                                <div class="col-md-6">
                                    <input id="cin" type="text" class="form-control fw-semibold @error('cin') is-invalid @enderror" name="cin" value="{{ old('cin') }}" minlength="5" maxlength="10" required autocomplete="cin">
    
                                    @error('cin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="permis" class="col-md-4 col-form-label text-md-end">{{ __('n° permis') }}</label>
    
                                <div class="col-md-6">
                                    <input id="permis" type="text" class="form-control fw-semibold @error('permis') is-invalid @enderror" name="permis" value="{{ old('permis') }}" minlength="" maxlength="" required autocomplete="permis">
    
                                    @error('permis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-2">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary me-2">
                                        {{ __('Register') }}
                                    </button>
                                    <a class="btn btn-link" href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>