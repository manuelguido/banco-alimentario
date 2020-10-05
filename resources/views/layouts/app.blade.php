<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        
        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Custom Header -->
        @yield('header')
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>
        {{-- App --}}
        <script src="{{ asset('js/app.min.js') }}"></script>
    </body>
</html>
