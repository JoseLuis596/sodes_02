@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Transporte</h2>

    <p><strong>Marca:</strong> {{ $transporte->marca }}</p>
    <p><strong>Modelo:</strong> {{ $transporte->modelo }}</p>
    <p><strong>Año:</strong> {{ $transporte->anio }}</p>
    <p><strong>Capacidad:</strong> {{ $transporte->capacidad }} kg</p>
    <p><strong>Cliente:</strong> {{ $transporte->cliente->nombre }}</p>

    <a href="{{ route('transportes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
