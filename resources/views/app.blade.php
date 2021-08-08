<!DOCTYPE html>
<html lang="es">

<head>
    {{-- Meta --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('fonts/iconly/Iconly-Bold-v2.0/style.css') }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
</head>

<body>
    {{-- App --}}
    <div id="app">
        <app></app>
    </div>
    {{-- Scripts --}}
    <script src="{{ asset('js/app001.min.js') }}"></script>
</body>

</html>
