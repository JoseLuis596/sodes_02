@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h2 class="mb-4">Editar Proveedor</h2>

            <form action="{{ route('proveedores.update', $proveedor->idProveedor) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="razonSocial" class="form-label">Razón Social</label>
                    <input type="text" id="razonSocial" name="razonSocial" class="form-control" value="{{ old('razonSocial', $proveedor->razonSocial) }}" required>
                </div>

                <div class="mb-3">
                    <label for="nombreCompleto" class="form-label">Nombre Completo</label>
                    <input type="text" id="nombreCompleto" name="nombreCompleto" class="form-control" value="{{ old('nombreCompleto', $proveedor->nombreCompleto) }}" required>
                </div>

                <div class="mb-3">
                    <label for="rfc" class="form-label">RFC</label>
                    <input type="text" id="rfc" name="rfc" class="form-control" value="{{ old('rfc', $proveedor->rfc) }}" required maxlength="13">
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <textarea id="direccion" name="direccion" class="form-control" rows="3" required>{{ old('direccion', $proveedor->direccion) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', $proveedor->telefono) }}" required>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" class="form-control" value="{{ old('correo', $proveedor->correo) }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
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
