@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')

<div class="container-fluid py-5">
    <div class="row justify-content-center">
        
        <div class="col-12 text-lg-right">

            <title-min title="Asociate como: "></title-min>

            <seed-outline-button-rounded
                color="primary"
                size="md"
                title="Donante"
                url="{{ url('register/giver') }}"
            ></seed-outline-button-rounded>

            <seed-outline-button-rounded
                color="a"
                size="md"
                title="Voluntario"
                url="{{ url('register/volunteer') }}"
            ></seed-outline-button-rounded>

        </div>
        
        <div class="col-12 col-lg-5 py-5">
            <div class="card">
                <div class="card-body p-5">
                    <div class="row justify-content-center">
                        
                        <auth-top-panel title="Iniciar sesión"></auth-top-panel>

                        <auth-left-panel img_url="{{ asset('img/login.png') }}"></auth-left-panel>

                        <div class="col-12 col-lg-7 pt-5">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group mb-4">
                                    <form-label for="password" title="Ingresa tu email"></form-label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="enterprise@dominio.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <form-label for="password" title="Ingresa tu contraseña"></form-label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <auth-submit-button title="Entrar"></auth-submit-button>

                                <div class="form-group text-center text-lg-right mt-5">
                                    @if (Route::has('password.request'))
                                        <p>
                                            Olvidaste tu contraseña?
                                            <a href="{{ route('password.request') }}">{{ __('Recupérala') }}</a>
                                        </p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <back-home-button></back-home-button>
    </div>
</div>
@endsection
