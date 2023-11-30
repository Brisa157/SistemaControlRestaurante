@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Platillo</h2>
        <!-- Formulario para crear un nuevo platillo -->
        <form action="{{ route('platillos.store') }}" method="POST" class="ui form" enctype="multipart/form-data">
            @csrf
            <div class="two fields">
                <div class="field">
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="field">
                    <label for="categoria_id">Categoría:</label>
                    <select class="ui dropdown" id="categoria_id" name="categoria_id" required>
                        <option value="">Seleccione una categoria</option>

                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" name="precio" required>
                </div>
                <div class="field">
                    <label for="imagen">Imagen:</label>
                    <input type="file" id="imagen" name="imagen">
                </div>
            </div>
            <button class="ui black button" type="submit">Guardar</button>
        </form>
    </div>
@endsection
