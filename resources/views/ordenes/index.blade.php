@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Listado de Ordenes
            <a href="{{ route('ordenes.create') }}" class="ui green button" style="float: right;">NUEVA ORDEN</a>
        </h2>
        <!-- Mostrar la tabla con los platillos -->
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Estatus</th>
                    <th>ID Orden</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $estatus => $ordenes)
                    <tr>
                        <td colspan="4"><strong>{{ ucfirst($estatus) }}</strong></td>
                    </tr>
                    @foreach ($ordenes as $orden)
                        <tr>
                            <td>{{ ucfirst($estatus) }}</td>
                            <td>{{ $orden->id }}</td>
                            <td>{{ $orden->fecha }}</td>
                            <td>
                                <a href="{{ route('ordenes.show', $orden->id) }}" class="ui teal button">
                                    Ver Detalles
                                </a>
                                @if($estatus == 'Pendiente')
                                    <form action="{{ route('orden.terminar', $orden->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="ui blue button">Terminar</button>
                                    </form>
                                    <form action="{{ route('orden.cancelar', $orden->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="ui red button">Cancelar</button>
                                    </form>
                                    <a href="{{ url('pagos/create/' . $orden->id) }}" class="ui green button">Pagar</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
