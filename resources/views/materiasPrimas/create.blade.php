@extends('layouts.app') {{-- Cambia según tu layout base --}}

@section('content')
<div class="container">
    <h2 class="mb-4">Registrar Nueva Materia Prima</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>¡Ups!</strong> Hubo algunos errores al guardar:<br><br>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('materiasPrimas.store') }}" method="POST" class="shadow p-4 rounded bg-light">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="unidad" class="form-label">Unidad de Medida</label>
                    <select class="form-control" id="unidad" name="unidad" required>
                        <option value="">-- Seleccionar --</option>
                        <option value="unidades">Unidades</option>
                        <option value="toneladas">Toneladas</option>
                        <option value="cajas">Cajas</option>
                        <option value="metros">Metros</option>
                        <option value="piezas">Piezas</option>
                        <option value="kilogramos">Kilogramos</option>
                        <option value="rollos">Rollos</option>
                    </select>
                </div>
            </div>

        </div>



        <div class="row mb-3">

            <div class="col-md-6">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" min="0" required>
            </div>
            <div class="col-md-6">
                <label for="expiracion" class="form-label">Fecha de Expiración</label>
                <input type="date" name="expiracion" class="form-control" value="{{ old('expiracion') }}">
            </div>
            
           
        </div>
        <div class="row mb-3">
             <div class="col-md-6">
                <label for="idProveedor" class="form-label">Proveedor</label>
                <select name="idProveedor" class="form-select" required>
                    <option value="">-- Selecciona un proveedor --</option>
                    @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->idProveedor }}" {{ old('idProveedor') == $proveedor->idProveedor ? 'selected' : '' }}>
                        {{ $proveedor->nombreCompleto }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="descripcion" class="form-label">Descripción</label>
                <input name="descripcion" class="form-control"required>{{ old('descripcion') }}</input>
            </div>
        </div>

        <div class="mb-3">
            <label for="idAlmacen" class="form-label">Almacén</label>
            <select name="idAlmacen" class="form-select" required>
                <option value="">-- Selecciona un almacén --</option>
                @foreach($almacen as $alm)
                <option value="{{ $alm->idAlmacen }}" {{ old('idAlmacen') == $alm->idAlmacen ? 'selected' : '' }}>
                    {{ $alm->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('materiasPrimas.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection