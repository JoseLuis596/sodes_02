@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4 rounded">
        <h2 class="text-center text-primary mb-4"><i class="bi bi-boxes"></i> Agregar Almacén</h2>

        <form action="{{ route('almacen.store') }}" method="POST">
            @csrf

            {{-- Datos del almacén --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input
                        type="text"
                        class="form-control @error('nombre') is-invalid @enderror"
                        id="nombre"
                        name="nombre"
                        value="{{ old('nombre') }}"
                        required
                    >
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="direccion" class="form-label">Ubicación en planta</label>
                    <input
                        type="text"
                        class="form-control @error('direccion') is-invalid @enderror"
                        id="direccion"
                        name="direccion"
                        value="{{ old('direccion') }}"
                        required
                    >
                    @error('direccion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="capacidad" class="form-label">Capacidad Total</label>
                    <input
                        type="number"
                        class="form-control @error('capacidad') is-invalid @enderror"
                        id="capacidad"
                        name="capacidad"
                        value="{{ old('capacidad') }}"
                        required
                        min="1"
                    >
                    @error('capacidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="unidad_medida" class="form-label">Unidad de Medida</label>
                    <select
                        class="form-control @error('unidad_medida') is-invalid @enderror"
                        id="unidad_medida"
                        name="unidad_medida"
                        required
                    >
                        <option value="">-- Seleccionar --</option>
                        <option value="unidades" {{ old('unidad_medida') == 'unidades' ? 'selected' : '' }}>Unidades</option>
                        <option value="toneladas" {{ old('unidad_medida') == 'toneladas' ? 'selected' : '' }}>Toneladas</option>
                        <option value="cajas" {{ old('unidad_medida') == 'cajas' ? 'selected' : '' }}>Cajas</option>
                        <option value="metros" {{ old('unidad_medida') == 'metros' ? 'selected' : '' }}>Metros</option>
                        <option value="piezas" {{ old('unidad_medida') == 'piezas' ? 'selected' : '' }}>Piezas</option>
                        <option value="kilogramos" {{ old('unidad_medida') == 'kilogramos' ? 'selected' : '' }}>Kilogramos</option>
                        <option value="rollos" {{ old('unidad_medida') == 'rollos' ? 'selected' : '' }}>Rollos</option>
                    </select>
                    @error('unidad_medida')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('almacen.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle-fill"></i> Guardar Almacén
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
