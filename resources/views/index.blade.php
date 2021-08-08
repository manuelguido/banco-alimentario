<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Banco Alimentario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,600;0,700;1,300&display=swap"
        rel="stylesheet">
    <link rel="icon" href="{{ asset('img/artwork/favicon.png') }}">
    @yield('header')
    <style>
        .container {
            height: 100vh;
        }
        .title {
            color: rgb(103, 99, 99);
            font-family: 'Nunito', sans-serif;
            font-weight: 400;
        }
    </style>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center">
        <h1 class="title animated">Sitio no accesible</h1>
    </div>
</body>

</html>
