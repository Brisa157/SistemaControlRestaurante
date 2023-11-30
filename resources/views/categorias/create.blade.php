@extends('layouts.app')

@section('content')
    <div class="ui container">
        <h2 class="ui header">Crear Categoría</h2>
        <!-- Formulario para crear una nueva categoría -->
        <form class="ui form" action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="ui grid">
                <div class="eight wide column">
                    <div class="field">
                        <label for="name">Nombre:</label>
                        <input type="text" id="name" name="name" placeholder="Nombre de la categoría" required>
                    </div>
                </div>
            </div><br>
            <button class="ui black button" type="submit">Guardar</button>
        </form>
    </div>
@endsection
