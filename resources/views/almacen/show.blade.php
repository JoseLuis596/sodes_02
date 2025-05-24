@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Almacén</h2>

    <p><strong>ID:</strong> {{ $almacen->idAlmacen }}</p>
    <p><strong>Nombre:</strong> {{ $almacen->nombre }}</p>
    <p><strong>Ubicación:</strong> {{ $almacen->direccion }}</p>
    <p><strong>Capacidad:</strong> {{ $almacen->capacidad }} {{ ucfirst($almacen->unidad_medida) }}</p>
    
    <p><strong>Materias Primas Asociadas:</strong></p>
    @if($almacen->materiasPrimas->isNotEmpty())
        <ul>
            @foreach($almacen->materiasPrimas as $mp)
                <li>{{ $mp->nombre }} ({{ $mp->unidad ?? $mp->unidad_medida ?? 'u' }})</li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">No hay materias primas asociadas.</p>
    @endif

    <a href="{{ route('almacen.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
