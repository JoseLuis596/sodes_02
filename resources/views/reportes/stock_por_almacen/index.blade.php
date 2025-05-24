@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Stock Actual por Almacén</h2>

    <a href="{{ route('stockalmacen.pdf') }}" class="btn btn-danger mb-3">
        <i class="bi bi-file-earmark-pdf"></i> Exportar PDF
    </a>

    @if(count($stock) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Almacén</th>
                    <th>Materia Prima</th>
                    <th>Stock Actual</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stock as $s)
                <tr>
                    <td>{{ $s->almacen }}</td>
                    <td>{{ $s->materia_prima }}</td>
                    <td>{{ $s->stock_actual }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay datos disponibles.</p>
    @endif
</div>
@endsection
