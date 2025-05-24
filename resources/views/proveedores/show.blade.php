@extends('layouts.app')

@section('content')

<div class='container'>
    <h2>Detalles del Proveedor</h2>
    <p><strong>Razon Social:</strong>{{$proveedor->razonSocial}}</p>
    <p><strong>Nombre Completo:</strong>{{$proveedor->nombreCompleto}}</p>
    <p><strong>Dirección:</strong>{{$proveedor->direccion}}</p>
    <p><strong>Telefono Celular:</strong>$proveedor->telefono</p>
    <p><strong>Correo:</strong>$proveedor->correo</p>
    <p><strong>RFC:</strong>$proveedor->rfc</p>
    <a href="{{route('proveedores.index')}}" class="btn btn-secondary">Volver</a>
</div>
@endsection