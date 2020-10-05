@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')

<navbar></navbar>

{{-- Container --}}
<div class="container">
    {{-- Row --}}
    <div class="row justify-content-center">
        {{-- Login card --}}
        <login-card>
            {{-- Form --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf
                {{-- Email --}}
                <div class="form-group mb-4">
                    <form-label for="email" title="Ingresa tu email"></form-label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="enterprise@dominio.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Password --}}
                <div class="form-group mb-4">
                    <form-label for="password" title="Ingresa tu contraseña"></form-label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Submit --}}
                <submit-button text="Entrar"></submit-button>
                {{-- <div class="form-group text-center text-lg-right mt-5">
                    @if (Route::has('password.request'))
                        <p>
                            Olvidaste tu contraseña?
                            <a href="{{ route('password.request') }}">{{ __('Recupérala') }}</a>
                        </p>
                    @endif
                </div> --}}
            </form>
            {{-- /.Form --}}
        </login-card>
        {{-- /.Login card --}}
    </div>
    {{-- Row --}}
</div>
{{-- Container --}}
@endsection
