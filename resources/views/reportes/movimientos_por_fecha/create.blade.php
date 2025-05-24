@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Reporte de Movimientos por Rango de Fechas</h2>
    <form method="POST" action="{{ route('movimientosfecha.show') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="fechaInicio">Fecha Inicio:</label>
            <input type="date" class="form-control" name="fechaInicio" required>
        </div>
        <div class="form-group mb-3">
            <label for="fechaFin">Fecha Fin:</label>
            <input type="date" class="form-control" name="fechaFin" required>
        </div>
        <button type="submit" class="btn btn-primary">Generar Reporte</button>
    </form>
</div>
@endsection
