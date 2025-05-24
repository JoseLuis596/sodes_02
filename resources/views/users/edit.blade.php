@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h2 class="mb-4">Editar Usuario</h2>

            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre completo</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="numControl" class="form-label">Número de control</label>
                    <input type="text" id="numControl" name="numControl" class="form-control" value="{{ old('numControl', $user->numControl) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="idRol" class="form-label">Rol</label>
                    <select class="form-control" id="idRol" name="idRol" required>
                        <option value="" disabled>Selecciona un rol</option>
                        <option value="1" {{ old('idRol', $user->idRol) == 1 ? 'selected' : '' }}>Administrador</option>
                        <option value="2" {{ old('idRol', $user->idRol) == 2 ? 'selected' : '' }}>Gerente general</option>
                        <option value="3" {{ old('idRol', $user->idRol) == 3 ? 'selected' : '' }}>Gerente de producción</option>
                        <option value="4" {{ old('idRol', $user->idRol) == 4 ? 'selected' : '' }}>Gerente de logística</option>
                        <option value="5" {{ old('idRol', $user->idRol) == 5 ? 'selected' : '' }}>Encargado de almacén</option>
                        <option value="6" {{ old('idRol', $user->idRol) == 6 ? 'selected' : '' }}>Encargado de empaque</option>
                        <option value="7" {{ old('idRol', $user->idRol) == 7 ? 'selected' : '' }}>Encargado de aduana</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
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
