@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Empleados</h1>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Puesto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->name }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->rol }}</td>
                        <td>
                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ui red button" onclick="return confirm('¿Estás seguro de eliminar este empleado?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
