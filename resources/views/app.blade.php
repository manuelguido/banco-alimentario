<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- Meta --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Title --}}
    <title>Banco alimentario</title>
    {{-- Icons --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
</head>
<body>
    {{-- App --}}
    <div id="app">
        <app></app>
    </div>
    {{-- Scripts --}}
    <script src="{{ asset('js/app01.min.js') }}"></script>
</body>
</html>
