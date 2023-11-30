@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="ui header">Editar Categoría</h2>
        <!-- Formulario para editar una categoría existente -->
        <form class="ui form" action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="ui grid">
                <div class="eight wide column">
                    <div class="field">
                        <label>Nombre:</label>
                        <input type="text" name="name" value="{{ $categoria->name }}" required>
                    </div>
                </div>
            </div><br>
            <button class="ui black button" type="submit">Actualizar</button>
        </form>
    </div>
@endsection
