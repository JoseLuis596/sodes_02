@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Movimientos del {{ \Carbon\Carbon::parse($fechaInicio)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($fechaFin)->format('d/m/Y') }}</h2>

    <a href="{{ route('movimientosfecha.pdf', [$fechaInicio, $fechaFin]) }}" class="btn btn-danger mb-3">
        <i class="bi bi-file-earmark-pdf"></i> Exportar PDF
    </a>

    @if (count($movimientos) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Movimiento</th>
                    <th>Materia Prima</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $m)
                    <tr>
                        <td>{{ $m->idMovimiento }}</td>
                        <td>{{ $m->materia_prima }}</td>
                        <td>{{ ucfirst($m->tipo) }}</td>
                        <td>{{ $m->cantidad }}</td>
                        <td>{{ $m->descripcion }}</td>
                        <td>{{ \Carbon\Carbon::parse($m->fecha)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron movimientos en este rango de fechas.</p>
    @endif
</div>
@endsection
