@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="card shadow-lg p-4 rounded">
        <h2 class="text-center text-primary mb-4">
            <i class="bi bi-truck"></i> Agregar Transporte
        </h2>
        <form action="{{ route('transportes.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="anio" class="form-label">Año</label>
                    <input type="number" class="form-control" id="anio" name="anio" min="1900" max="{{ date('Y') + 1 }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="capacidad" class="form-label">Capacidad (kg)</label>
                    <input type="number" class="form-control" id="capacidad" name="capacidad" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="idCliente" class="form-label">Cliente</label>
                <select class="form-control" id="idCliente" name="idCliente" required>
                    <option value="">Seleccione el Cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->idCliente }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('transportes.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle-fill"></i> Guardar
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
