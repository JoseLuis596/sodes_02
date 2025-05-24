@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Productos por Proveedor</h2>

    <a href="{{ route('productosproveedor.pdf') }}" class="btn btn-danger mb-3">
        <i class="bi bi-file-earmark-pdf"></i> Exportar PDF
    </a>

    @if(count($productos) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Proveedor</th>
                    <th>Materia Prima</th>
                    <th>Unidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->proveedor }}</td>
                    <td>{{ $producto->materia_prima }}</td>
                    <td>{{ $producto->unidad }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay datos disponibles.</p>
    @endif
</div>
@endsection
