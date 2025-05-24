@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Clientes Frecuentes</h2>

    <a href="{{ route('clientesfrecuentes.pdf') }}" class="btn btn-danger mb-3">
        <i class="bi bi-file-earmark-pdf"></i> Exportar a PDF
    </a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Cliente</th>
                <th>Nombre</th>
                <th>Total Pedidos</th>
                <th>Volumen Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->idCliente }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->total_pedidos }}</td>
                    <td>{{ $cliente->volumen_total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
