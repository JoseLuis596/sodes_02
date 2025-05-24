@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Transportes por Cliente</h2>

    <a href="{{ route('transportescliente.pdf') }}" class="btn btn-danger mb-3">
        <i class="bi bi-file-earmark-pdf"></i> Exportar PDF
    </a>

    @if(count($datos) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>ID Transporte</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Capacidad</th>
                    <th>Unidad</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos as $item)
                <tr>
                    <td>{{ $item->nombreCliente }}</td>
                    <td>{{ $item->idTransporte }}</td>
                    <td>{{ $item->transporteDescripcion }}</td>
                    <td>{{ $item->tipo }}</td>
                    <td>{{ $item->capacidad }}</td>
                    <td>{{ $item->unidad }}</td>
                    <td>{{ ucfirst($item->estado) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay transportes asignados a clientes.</p>
    @endif
</div>
@endsection
