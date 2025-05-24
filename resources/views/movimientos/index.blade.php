@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Lista de Movimientos</h2>
    <a href="{{ route('movimientos.create') }}" class="btn btn-primary mb-3">Agregar Movimiento</a>
  

    <table class="table hacker-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Movimiento</th>
                <th>Cantidad</th>
                <th>Fecha Movimiento</th>
                <th>Materia Prima</th>
                <th>Almacén</th>
                <th>Usuario</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimientos as $movimiento)
            <tr>
                <td>{{ $movimiento->idMovimiento }}</td>
                <td>{{ $movimiento->tipoMovimiento }}</td>
                <td>{{ $movimiento->cantidad }}</td>
                <td>{{ \Carbon\Carbon::parse($movimiento->fechaMovimiento)->format('d/m/Y') }}</td>
                <td>{{ $movimiento->materiaprima->nombre }}</td>
                <td>{{ $movimiento->almacen->nombre }}</td>
                <td>{{ $movimiento->users->name }}</td>
                <td>
                    <a href="{{ route('movimientos.show', $movimiento->idMovimiento) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('movimientos.edit', $movimiento->idMovimiento) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('movimientos.destroy', $movimiento->idMovimiento) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar movimiento?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
 <div class="d-flex justify-content-center">
        {{ $movimientos->links('pagination::simple-bootstrap-5') }}
    </div>
</div>
@endsection
