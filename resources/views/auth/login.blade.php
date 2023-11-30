@extends('layouts.app')

@section('content')
    <div class="ui middle aligned center aligned grid" style="background-color: rgba(0, 0, 0, 0.89); height: 100vh;">
        <div class="two column row" style="height: 100%;">
            <div class="column" style="background-color: rgb(0, 0, 0); height: 100vh;"><br><br><br><br>
                <img src="{{ asset('images/login2.jpg') }}" alt="Imagen" style="max-width: 103%; height: auto; display: block; margin: auto;">
            </div>
            <div class="column" style="max-width: 450px; background-color: black; height: 100vh;">
                <h2 class="ui teal image header"><br><br><br>
                    <img class="ui circular image" src="{{ asset('images/logo.jpg') }}" alt="Logo" >
                </h2>
                <form class="ui large form" method="POST" action="{{ route('login') }}" >
                    @csrf
                    <div class="ui stacked segment" style="background-color: rgba(255, 60, 0, 0.842);">
                        <div class="field">
                            <div class="ui left icon input">
                                <input type="email" name="email" placeholder="CORREO ELECTRÓNICO" required autofocus>
                            </div>
                            @error('email')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <input type="password" name="password" placeholder="CONTRASEÑA" required>
                            </div>
                            @error('password')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" style="background-color: black;" class="ui fluid large teal submit button">Iniciar Sesión</button>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="ui message" style="background-color: rgba(255, 60, 0, 0.199);">
                            <a href="{{ route('password.request') }}"></a>
                        </div>
                    @endif
                </form>
                <div class="ui message" style="background-color: rgba(255, 60, 0, 0.199); color: white">
                    ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a>
                </div>
            </div>
        </div>
    </div>
@endsection
