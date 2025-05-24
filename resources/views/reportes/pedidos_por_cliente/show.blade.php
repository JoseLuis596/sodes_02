
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pedidos del Cliente: {{ $cliente->nombre }}</h2>

    <a href="{{ route('pedidoscliente.pdf', $cliente->idCliente) }}" class="btn btn-danger mb-3">
        <i class="bi bi-file-earmark-pdf"></i> Exportar PDF
    </a>

    @if (count($pedidos) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->idPedido }}</td>
                        <td>{{ $pedido->producto }}</td>
                        <td>{{ $pedido->cantidad }}</td>
                        <td>{{ $pedido->estado }}</td>
                        <td>{{ \Carbon\Carbon::parse($pedido->fecha)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron pedidos para este cliente.</p>
    @endif
</div>
@endsection
