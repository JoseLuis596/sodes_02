@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h2 class="mb-4">Editar Transporte</h2>

            <form action="{{ route('transportes.update', $transporte->idTransporte) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" id="marca" name="marca" class="form-control" value="{{ old('marca', $transporte->marca) }}" required>
                </div>

                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" id="modelo" name="modelo" class="form-control" value="{{ old('modelo', $transporte->modelo) }}" required>
                </div>

                <div class="mb-3">
                    <label for="anio" class="form-label">Año</label>
                    <input type="number" id="anio" name="anio" class="form-control" value="{{ old('anio', $transporte->anio) }}" required>
                </div>

                <div class="mb-3">
                    <label for="capacidad" class="form-label">Capacidad (kg)</label>
                    <input type="number" id="capacidad" name="capacidad" class="form-control" value="{{ old('capacidad', $transporte->capacidad) }}" required>
                </div>

                <div class="mb-3">
                    <label for="idCliente" class="form-label">Cliente</label>
                    <select id="idCliente" name="idCliente" class="form-control" required>
                        <option value="">Seleccione un Cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->idCliente }}" {{ $transporte->idCliente == $cliente->idCliente ? 'selected' : '' }}>
                                {{ $cliente->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('transportes.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
