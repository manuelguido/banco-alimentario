<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Charset --}}
        <meta charset="utf-8">

        {{-- Viewport --}}
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Title --}}
        <title>@yield('title')</title>

        {{-- Fontawesome --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

        {{-- Fav Icon --}}
        <link rel="icon" href="{{ asset('img/artwork/favicon.png') }}">

        {{-- Custom Header --}}
        @yield('header')
    </head>
    <body>
        {{-- App --}}
        <div id="app">
            @yield('content')
        </div>
        {{-- App --}}
        <script src="{{ asset('js/app.min.js') }}"></script>
    </body>
</html>
