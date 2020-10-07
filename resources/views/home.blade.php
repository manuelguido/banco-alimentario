@extends('layouts.app')

@section('title', 'Banco alimentario: Inicio')

@section('content')
    {{-- Navbar --}}
    <navbar @auth auth @endauth></navbar>

    {{-- Home page content --}}
    <home-content></home-content>
@endsection
