<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('title', 'Connexion Echouée') }}</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="css/all.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container-fluid px-5">
        <h3 class="text-capitalize pt-5">Erreur de connexion à la base de données MySql : <span class="text-danger">la connexion n'est pas ouvert</span></h3>
        <h5 class="py-3">{{$e->getMessage()}}</h5>
        {{-- <div class="text_center">
            <button class="btn bg-warning">ouvrit la connexion</button>
        </div> --}}
    </div>
</body>
</html>