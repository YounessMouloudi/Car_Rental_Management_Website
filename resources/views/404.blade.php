<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('title', 'Not found') }}</title>

    <link rel="stylesheet" href="{{asset('css/notFound_style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="css/all.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>
<body>
    <div class="container">
        <div class="row text-light py-5">
            <div class="part-text col-lg-6 text-capitalize text-center text-lg-start d-flex flex-column justify-content-center my-5">
                <h1 class="mb-5">sorry, something's is wrong.</h1>
                <div>
                    <a href="http://127.0.0.1:8000/" class="btn text-capitalize fw-semibold">back to home</a>
                </div>
            </div>
            <div class="part-num col-lg-6 text-center text-capitalize">
                <h1 class="mt-3 mb-3">404</h1>
                <h6 class="fs-4">page not found</h6>
            </div>
        </div>
    </div>
</body>
</html>