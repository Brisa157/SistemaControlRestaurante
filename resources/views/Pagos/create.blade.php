@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="ui header">Detalles del pago</h2>
        <form class="ui form" action="{{ route('pagos.store') }}" method="POST">
            @csrf
            <div class="ui grid">
                <div class="eight wide column">
                    <div class="field">
                        <label>Descripcion:</label>
                        <input type="text" name="descripcion" value="{{ 'Orden N°'.$orden->id }}" required>
                    </div>
                </div>
                <div class="eight wide column">
                    <div class="field">
                        <label>Descripcion:</label>
                        <input type="number" name="total" value="{{ $total }}" required>
                    </div>
                </div>
                <div class="field">
                    <label for="tipo">Forma de pago:</label>
                    <select class="ui dropdown" id="tipo" name="tipo" required>
                        <option value="">Seleccione una forma de pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="Tarjeta">Tarjeta</option>
                        <option value="Credito">Credito</option>
                    </select>
                </div>
            </div><br>
            <button class="ui black button" type="submit">Crear</button>
        </form>
    </div>
@endsection
