<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        
        <!-- Styles & Icons -->
        {{-- <script defer src="{{ asset('fonts/fontawesome/js/all.min.js') }}"></script> --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        {{-- <script defer src="{{ asset('fonts/fontawesome/js/all.min.js') }}"></script> --}}
        
        <!-- Custom Header -->
        @yield('header')
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>
        <script src="{{ asset('js/app.min.js') }}"></script>
    </body>
</html>
