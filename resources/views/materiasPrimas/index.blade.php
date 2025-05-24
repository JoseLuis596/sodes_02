@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Materias Primas</h1>

    <a href="{{ route('materiasPrimas.create') }}" class="btn btn-primary mb-3">Registrar Materia Prima</a>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif (session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Unidad</th>
                <th>Proveedor</th>
                <th>Almacén</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materiasPrimas as $materiaPrima)
            <tr>
                <td>{{ $materiaPrima->idMateriaPrima }}</td>
                <td>{{ $materiaPrima->nombre }}</td>
                <td>{{ $materiaPrima->descripcion }}</td>
                <td>{{ $materiaPrima->unidad }}</td>
                <td>
                    @if ($materiaPrima->proveedor)
                    {{ $materiaPrima->proveedor->nombreCompleto }}
                    @else
                    <span class="text-muted">Sin proveedor</span>
                    @endif
                </td>
                <td>
                    @if ($materiaPrima->almacen)
                    {{ $materiaPrima->almacen->nombre }}
                    @else
                    <span class="text-muted">Sin almacén</span>
                    @endif
                </td>

                <td>{{ $materiaPrima->stock }}</td>
                <td>
                    <a href="{{ route('materiasPrimas.show', $materiaPrima->idMateriaPrima) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('materiasPrimas.edit', $materiaPrima->idMateriaPrima) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('materiasPrimas.destroy', $materiaPrima->idMateriaPrima) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta materia prima?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $materiasPrimas->links('pagination::simple-bootstrap-5') }}
    </div>
</div>
@endsection