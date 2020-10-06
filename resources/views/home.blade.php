@extends('layouts.app')

@section('title', 'Banco alimentario: Inicio')

@section('content')
    <navbar
        @auth auth @endauth
    ></navbar>

    Inicio de banco alimentario
@endsection
