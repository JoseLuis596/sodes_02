@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Producción del Día: {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}</h2>
    <a href="{{ route('produccion.pdf', $fecha) }}" class="btn btn-danger mb-3">
        <i class="bi bi-file-earmark-pdf"></i> Exportar a PDF
    </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tipo de Producto</th>
                <th>Total Producido</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $item)
                <tr>
                    <td>{{ $item->tipo_producto }}</td>
                    <td>{{ $item->total_producido }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
