@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Registrar Movimiento</h3>

    @if(session('danger'))
        <div class="alert alert-danger">{{ session('danger') }}</div>
    @endif

    <form action="{{ route('movimientos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="tipoMovimiento">Tipo de Movimiento</label>
            <select name="tipoMovimiento" class="form-control" required>
                @foreach($tiposMovimiento as $tipo)
                    <option value="{{ $tipo }}">{{ ucfirst($tipo) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" required min="1">
        </div>

        <div class="form-group">
            <label for="fechaMovimiento">Fecha</label>
            <input type="date" name="fechaMovimiento" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="idMateriaPrima">Materia Prima</label>
            <select name="idMateriaPrima" class="form-control" required>
                @foreach($materiasPrimas as $materia)
                    <option value="{{ $materia->idMateriaPrima }}">{{ $materia->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="idAlmacen">Almacén</label>
            <select name="idAlmacen" class="form-control" required>
                @foreach($almacen as $alm)
                    <option value="{{ $alm->idAlmacen }}">{{ $alm->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="idUsuario">Usuario Responsable</label>
            <select name="idUsuario" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->numControl }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        <a href="{{ route('movimientos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
