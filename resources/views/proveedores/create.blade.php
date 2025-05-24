@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4 rounded">
        <h2 class="text-center text-primary mb-4"><i class="bi bi-person-plus-fill"></i> Agregar Proveedor</h2>

        <form action="{{ route('proveedores.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="razonSocial" class="form-label">Razón Social</label>
                <input type="text" class="form-control" id="razonSocial" name="razonSocial" required>
            </div>

            <div class="mb-3">
                <label for="nombreCompleto" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" required>
            </div>

            <div class="mb-3">
                <label for="rfc" class="form-label">RFC</label>
                <input type="text" class="form-control" id="rfc" name="rfc" required maxlength="13">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <textarea class="form-control" id="direccion" name="direccion" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('proveedores.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
                <button type="submit" class="btn btn-success"><i class="bi bi-check-circle-fill"></i> Guardar Proveedor</button>
            </div>
        </form>
    </div>
</div>
@endsection
