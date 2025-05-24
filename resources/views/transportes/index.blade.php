@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Lista de Transportes</h2>
    <a href="{{ route('transportes.create') }}" class="btn btn-primary mb-3">Agregar Transporte</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Capacidad</th>
                <th>Cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transportes as $transporte)
            <tr>
                <td>{{ $transporte->idTransporte }}</td>
                <td>{{ $transporte->marca }}</td>
                <td>{{ $transporte->modelo }}</td>
                <td>{{ $transporte->anio }}</td>
                <td>{{ $transporte->capacidad }} kg</td>
                <td>{{ $transporte->cliente ? $transporte->cliente->nombre : 'Sin cliente asignado' }}</td>
                <td>
                    <a href="{{ route('transportes.show', $transporte->idTransporte) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('transportes.edit', $transporte->idTransporte) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('transportes.destroy', $transporte->idTransporte) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar transporte?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $transportes->links() }}
</div>
@endsection
