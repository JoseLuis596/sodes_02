@extends('layouts.app')



@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h2 class="mb-4">Editar Cliente</h2>

            <form action="{{ route('clientes.update', $cliente) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $cliente->nombre) }}" required>
                </div>

                <div class="mb-3">
                    <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
                    <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="form-control" value="{{ old('apellidoPaterno', $cliente->apellidoPaterno) }}" required>
                </div>

                <div class="mb-3">
                    <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                    <input type="text" id="apellidoMaterno" name="apellidoMaterno" class="form-control" value="{{ old('apellidoMaterno', $cliente->apellidoMaterno) }}">
                </div>

                <div class="mb-3">
                    <label for="rfc" class="form-label">RFC</label>
                    <input type="text" id="rfc" name="rfc" class="form-control" value="{{ old('rfc', $cliente->rfc) }}" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $cliente->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <textarea id="direccion" name="direccion" class="form-control" required>{{ old('direccion', $cliente->direccion) }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
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
