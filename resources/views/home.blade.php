<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Banco alimentario</title>

    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
    <script defer src="{{ asset('fonts/fontawesome/js/all.min.js') }}"></script>

    <!-- Style -->
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightseed.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <app></app>
    </div>
    <script src="{{ asset('js/app.min.js') }}"></script>
</body>
</html>
