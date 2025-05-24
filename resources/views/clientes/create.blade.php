@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4 rounded">
        <h2 class="text-center text-primary mb-4"><i class="bi bi-person-plus-fill"></i> Agregar Cliente</h2>

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label"> Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="apellidoPaterno" class="form-label"> Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="rfc" class="form-label">RFC</label>
                        <input type="text" class="form-control" id="rfc" name="rfc" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label"> Correo</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <textarea class="form-control" id="direccion" name="direccion" required></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
                <button type="submit" class="btn btn-success"><i class="bi bi-check-circle-fill"></i> Guardar Cliente</button>
            </div>
        </form>
    </div>
</div>
@endsection
