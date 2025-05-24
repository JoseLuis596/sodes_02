{{-- resources/views/materiasPrimas/show.blade.php --}}
@extends('layouts.app') {{-- O el layout que estés usando --}}

@section('content')
<div class="container">
    <h2>Detalle de Materia Prima</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $materiaPrima->nombre }}</p>
            <p><strong>Descripción:</strong> {{ $materiaPrima->descripcion }}</p>
            <p><strong>Unidad:</strong> {{ $materiaPrima->unidad }}</p>
            <p><strong>Stock:</strong> {{ $materiaPrima->stock }}</p>
            <p><strong>Expiración:</strong> {{ $materiaPrima->expiracion }}</p>
            <p><strong>Proveedor:</strong> {{ $materiaPrima->proveedor->nombre ?? 'N/A' }}</p>
            <p><strong>Almacén:</strong> {{ $materiaPrima->almacen->nombre ?? 'N/A' }}</p>
        </div>
    </div>
    <a href="{{ route('materiasPrimas.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
