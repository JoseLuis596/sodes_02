@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Transportes Disponibles</h2>

    <a href="{{ route('transportesdisponibles.pdf') }}" class="btn btn-danger mb-3">
        <i class="bi bi-file-earmark-pdf"></i> Exportar PDF
    </a>

    @if(count($transportes) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Capacidad</th>
                    <th>Unidad</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transportes as $transporte)
                <tr>
                    <td>{{ $transporte->idTransporte }}</td>
                    <td>{{ $transporte->descripcion }}</td>
                    <td>{{ $transporte->tipo }}</td>
                    <td>{{ $transporte->capacidad }}</td>
                    <td>{{ $transporte->unidad }}</td>
                    <td>{{ ucfirst($transporte->estado) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay transportes disponibles.</p>
    @endif
</div>
@endsection
