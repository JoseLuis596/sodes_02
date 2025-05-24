@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Stock por Etapa</h2>
    <a href="{{ route('stock.etapa.pdf') }}" class="btn btn-danger mb-3">
        <i class="bi bi-file-earmark-pdf"></i> Exportar a PDF
    </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Almacén</th>
                <th>Materia Prima</th>
                <th>Capacidad Máxima</th>
                <th>Stock Actual</th>
                <th>% Ocupado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $dato)
                <tr>
                    <td>{{ $dato->nombreAlmacen }}</td>
                    <td>{{ $dato->nombreMateriaPrima }}</td>
                    <td>{{ $dato->capacidad_maxima }}</td>
                    <td>{{ $dato->stock }}</td>
                    <td>{{ round($dato->porcentajeOcupado, 2) }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
