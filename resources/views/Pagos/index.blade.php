@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Pagos</h2>
        <!-- Mostrar la tabla con los platillos -->
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descipcion</th>
                    <th>Tipo</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pagos as $pago)
                <tr>
                    <td>{{ $pago->id }}</td>
                    <td>{{ $pago->descripcion }}</td>
                    <td>{{ $pago->tipo }}</td>
                    <td>${{ number_format($pago->total, 2) }}</td>
                    <td>
                        <!-- Enlaces a editar y eliminar -->
                        <div class="ui buttons">
                            <form action="{{ route('pagos.destroy', $pago->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="ui red button" type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este pago?')">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
