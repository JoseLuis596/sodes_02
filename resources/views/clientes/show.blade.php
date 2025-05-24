@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Cliente</h2>
    
    <p><strong>Nombre:</strong> {{ $cliente->nombre }} {{ $cliente->apellidoPaterno }} {{ $cliente->apellidoMaterno }}</p>
    <p><strong>RFC:</strong> {{ $cliente->rfc }}</p>
    <p><strong>Correo:</strong> {{ $cliente->email }}</p>
    <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
    <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
