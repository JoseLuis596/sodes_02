@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Almacenes</h1>
    <a href="{{ route('almacen.create') }}" class="btn btn-primary mb-3">Nuevo Almacén</a>

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Capacidad</th>
                <th>Unidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($almacenes as $almacen)
                <tr>
                    <td>{{ $almacen->idAlmacen }}</td>
                    <td>{{ $almacen->nombre }}</td>
                    <td>{{ $almacen->direccion }}</td>
                    <td>{{ $almacen->capacidad }}</td>
                    <td>{{ ucfirst($almacen->unidad_medida) }}</td>
                    
                    <td>
                        <a href="{{ route('almacen.show', $almacen) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('almacen.edit', $almacen) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('almacen.destroy', $almacen) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este almacén?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 <div class="d-flex justify-content-center">
        {{ $almacenes->links('pagination::simple-bootstrap-5') }}
    </div>
</div>
@endsection
