@extends('layouts.app')

@section('content')
    <div class="ui middle aligned center aligned grid" style="background-color: rgba(0, 0, 0, 0.89); height: 100vh;">
        <div class="two column row" style="height: 100%;">
            <div class="column" style="background-color: rgb(0, 0, 0); height: 100vh;"><br><br><br><br><br>
                <img src="{{ asset('images/login2.jpg') }}" alt="Imagen" style="max-width: 103%; height: auto; display: block; margin: auto;">
            </div>
            <div class="column" style="max-width: 450px; background-color: black; height: 100vh;">
                <h2 class="ui teal image header"><br>
                    <img class="ui circular image" src="{{ asset('images/logo.jpg') }}" alt="Logo" >
                </h2>
                <form class="ui large form" method="POST" action="{{ route('register') }}" >
                    @csrf
                    <div class="ui stacked segment" style="background-color: rgba(255, 60, 0, 0.842);">
                        <div class="field">
                            <div class="ui input">
                                <input type="text" name="name" placeholder="NOMBRE COMPLETO" required autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <select class="ui fluid dropdown" name="rol" required autofocus>
                                <option value="">SELECCIONA UN PUESTO</option>
                                <option value="administrador">ADMINISTRADOR</option>
                                <option value="mesero">MESERO</option>
                                <option value="cocinero">COCINERO</option>
                                <option value="cajero">CAJERO</option>
                            </select>
                        </div>
                        <div class="field">
                            <div class="ui input">
                                <input type="email" name="email" placeholder="CORREO ELECTRÓNICO" required autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui input">
                                <input type="password" name="password" placeholder="CONTRASEÑA" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui input">
                                <input type="password" name="password_confirmation" placeholder="CONFIRMAR CONTRASEÑA" required>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="ui negative message">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button type="submit" style="background-color: black;" class="ui fluid large teal submit button">Registrar</button>
                    </div>
                </form>
                <div class="ui message" style="background-color: rgba(255, 60, 0, 0.199); color: white">
                    ¿Tienes cuenta? <a href="{{ route('login') }}">Iniciar Sesion</a>
                </div>
            </div>
        </div>
    </div>
@endsection
