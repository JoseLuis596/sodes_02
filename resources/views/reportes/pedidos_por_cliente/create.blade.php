@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Seleccionar Cliente para Ver Pedidos</h2>
    <form method="POST" action="{{ route('pedidoscliente.show') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="idCliente">Cliente:</label>
            <select class="form-control" id="idCliente" name="idCliente" required>
                <option value="">Seleccione un cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->idCliente }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ver Pedidos</button>
    </form>
</div>
@endsection
