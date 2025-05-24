@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Movimiento</h2>
    
    <p><strong>Tipo de Movimiento:</strong> {{ $movimiento->tipoMovimiento }}</p>
    <p><strong>Cantidad:</strong> {{ $movimiento->cantidad }}</p>
    <p><strong>Fecha del Movimiento:</strong> {{ \Carbon\Carbon::parse($movimiento->fechaMovimiento)->format('d/m/Y') }}</p>
    <p><strong>Materia Prima:</strong> {{ $movimiento->materiaprima->nombre }}</p>
    <p><strong>Almacén:</strong> {{ $movimiento->almacen->nombre }}</p>
    <p><strong>Usuario:</strong> {{ $movimiento->users->name }}</p>
    
    <a href="{{ route('movimientos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
