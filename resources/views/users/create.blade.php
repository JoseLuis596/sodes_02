@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4 rounded">
        <h2 class="text-center text-primary mb-4">
            <i class="bi bi-person-plus-fill"></i> Agregar Usuario
        </h2>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="numControl" class="form-label">Número de control</label>
                        <input type="text" class="form-control" id="numControl" name="numControl" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                    <label for="idRol" class="form-label">Rol</label>
                <select name="idRol" id="idRol" class="form-control" required>
                    <option value="" disabled selected>Selecciona un rol</option>
                    @foreach($roles as $rol)
                    <option value="{{ $rol->idRol }}">{{ $rol->nombre }}</option>
                    @endforeach
                </select>
            </div>


            <div class="d-flex justify-content-between">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle-fill"></i> Guardar Usuario
                </button>
            </div>
        </form>
    </div>
</div>
@endsection