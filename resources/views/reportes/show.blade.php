@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detalle del Reporte</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $reporte->idReporte }}</p>
            <p><strong>Nombre:</strong> {{ $reporte->nombre }}</p>
            <p><strong>Tipo:</strong> {{ $reporte->tipo }}</p>
            <p><strong>Generado por:</strong> {{ $reporte->usuario->name ?? 'N/A' }}</p>
            <p><strong>Fecha generado:</strong> {{ $reporte->fechaGenerado }}</p>
            <p><strong>Archivo PDF:</strong>
                @if($reporte->archivo_pdf)
                    <a href="{{ asset('storage/reportes/' . $reporte->archivo_pdf) }}" target="_blank" class="btn btn-sm btn-primary">Ver PDF</a>
                @else
                    No disponible
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('reportes.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
