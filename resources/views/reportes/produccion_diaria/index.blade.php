@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Reporte de Producción Diaria</h2>
    <form action="{{ route('produccion.generar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="fecha" class="form-label">Seleccionar Fecha:</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i> Generar Reporte
        </button>
    </form>
</div>
@endsection
