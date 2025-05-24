@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h2 class="mb-4">Editar Movimiento</h2>

            <form action="{{ route('movimientos.update', $movimiento) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="tipoMovimiento" class="form-label">Tipo de Movimiento</label>
                    <input type="text" id="tipoMovimiento" name="tipoMovimiento" class="form-control" value="{{ old('tipoMovimiento', $movimiento->tipoMovimiento) }}" required>
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{ old('cantidad', $movimiento->cantidad) }}" required>
                </div>

                <div class="mb-3">
                    <label for="fechaMovimiento" class="form-label">Fecha del Movimiento</label>
                    <input type="date" id="fechaMovimiento" name="fechaMovimiento" class="form-control" value="{{ old('fechaMovimiento', $movimiento->fechaMovimiento) }}" required>
                </div>

                <div class="mb-3">
                    <label for="idMateriaPrima" class="form-label">Materia Prima</label>
                    <select id="idMateriaPrima" name="idMateriaPrima" class="form-control" required>
                        <option value="">Seleccione una Materia Prima</option>
                        @foreach($materiasPrimas as $materia)
                            <option value="{{ $materia->idMateriaPrima }}" {{ $movimiento->idMateriaPrima == $materia->idMateriaPrima ? 'selected' : '' }}>
                                {{ $materia->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="idAlmacen" class="form-label">Almacén</label>
                    <select id="idAlmacen" name="idAlmacen" class="form-control" required>
                        <option value="">Seleccione un Almacén</option>
                        @foreach($almacen as $almacen)
                            <option value="{{ $almacen->idAlmacen }}" {{ $movimiento->idAlmacen == $almacen->idAlmacen ? 'selected' : '' }}>
                                {{ $almacen->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="idUsuario" class="form-label">Usuario</label>
                    <select id="idUsuario" name="idUsuario" class="form-control" required>
                        <option value="">Seleccione un Usuario</option>
                        @foreach($users as $usuario)
                            <option value="{{ $usuario->id }}" {{ $movimiento->idUsuario == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('movimientos.index') }}" class="btn btn-secondary">
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
