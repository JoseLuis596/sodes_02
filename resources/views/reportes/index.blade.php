@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Lista de Reportes</h2>

    <a href="{{ route('reportes.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-file-earmark-plus"></i> Generar Reporte
    </a>

    <table class="table hacker-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Generado por</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportes as $reporte)
            <tr>
                <td>{{ $reporte->idReporte }}</td>
                <td>{{ $reporte->tipo }}</td>
                <td>{{ \Carbon\Carbon::parse($reporte->fecha)->format('d/m/Y') }}</td>
                <td>{{ $reporte->usuario->name }}</td>
                <td>
                    <a href="{{ route('reportes.show', $reporte->idReporte) }}" class="btn btn-info btn-sm">
                        <i class="bi bi-eye"></i> Ver
                    </a>
                    <a href="{{ asset('storage/reportes/' . $reporte->archivo_pdf) }}" target="_blank" class="btn btn-secondary btn-sm">
                        <i class="bi bi-download"></i> PDF
                    </a>
                    <form action="{{ route('reportes.destroy', $reporte->idReporte) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este reporte?')">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
 <div class="d-flex justify-content-center">
        {{ $reportes->links('pagination::simple-bootstrap-5') }}
    </div>
    
</div>
@endsection
