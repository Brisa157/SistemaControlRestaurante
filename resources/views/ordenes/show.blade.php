@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles de la Orden #{{ $orden->id }}</h2>
        <div class="ui segment">
            <h3>Información de la Orden:</h3>
            <p>Fecha: {{ $orden->fecha }}</p>
            <p>Estatus: {{ $orden->status }}</p>
        </div>

        <h3>Agregar Platillos</h3>
        <div class="ui segment">
            <form action="{{ route('ordenes.agregar') }}" method="POST" class="ui form">
                @csrf
                <input type="hidden" name="order_id" value="{{ $orden->id }}">
                <div class="field">
                    <label for="platillo_id">Menu:</label>
                    <select class="ui dropdown" id="platillo_id" name="platillo_id" required>
                        <option value="">Seleccione un platillo</option>
                        @foreach ($platillos as $platillo)
                            <option value="{{ $platillo->id }}">{{ $platillo->name }} - ${{ $platillo->precio }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="ui primary button" type="submit">Agregar Platillo</button>
            </form>
        </div>

        <h3>Platillos Agregados a la Orden:</h3>
        <div class="ui segment">
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Platillo</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orden->ordenDetallis as $detalle)
                        <tr>
                            <td>{{ $detalle->platillo->name }}</td>
                            <td>{{ $detalle->platillo->categoria->name }}</td>
                            <td>${{ $detalle->platillo->precio }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
