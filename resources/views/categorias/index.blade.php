@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Listado de Categorias
            <a href="{{ route('categorias.create') }}" class="ui green button" style="float: right;">NUEVA CATEGORIA</a>
        </h2>
        <!-- Mostrar la tabla con los categorias -->
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->name }}</td>
                    <td>
                        <!-- Enlaces a editar y eliminar -->
                        <div class="ui buttons">
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="ui primary button">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="ui red button" type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar esta categoria?')">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
