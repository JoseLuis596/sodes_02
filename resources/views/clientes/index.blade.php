<!-- resources/views/clientes/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="mb-4">Lista de Clientes</h2>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Agregar Cliente</a>
    <!-- buscador--> 
    <form action="{{ route('clientes.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" placeholder="Buscar clientes" class="form-control" value="{{ request('search') }}">
    </form>
    <table class="table hacker-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>RFC</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->idCliente }}</td>
                <td>{{ $cliente->nombre }} {{ $cliente->apellidoPaterno }} {{ $cliente->apellidoMaterno }}</td>
                <td>{{ $cliente->rfc }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>
                    <a href="{{ route('clientes.show', $cliente->idCliente) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('clientes.edit', $cliente->idCliente) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente->idCliente) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar cliente?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $clientes->links('pagination::simple-bootstrap-5') }}
    </div>
</div>
@endsection
 