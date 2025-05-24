@extends('layouts.app')
@section('content')


<div class="container">
    <h2 class="mb-4">Lista de Proveedores</h2>
    <a href="{{route('proveedores.create') }}" class="btn btn-primary mb-3">Agregar</a>

    <table class="table hacker-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Razon Social</th>
                <th>Nombre Completo</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>RFC</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor )
            <tr>
                <td>{{$proveedor->idProveedor}}</td>
                <td>{{$proveedor->razonSocial}}</td>
                <td>{{$proveedor->nombreCompleto}}</td>
                <td>{{$proveedor->direccion}}</td>
                <td>{{$proveedor->telefono}}</td>
                <td>{{$proveedor->correo}}</td>
                <td>{{$proveedor->rfc}}</td>
                <td>
                    <a href="{{route('proveedores.show', $proveedor->idProveedor) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route ('proveedores.edit', $proveedor->idProveedor)}}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{route('proveedores.destroy', $proveedor->idProveedor)}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Eliminar Proveedor?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$proveedores->links('pagination::simple-bootstrap-5')}}
    </div>
</div>
@endsection