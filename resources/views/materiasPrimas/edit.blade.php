@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Materia Prima</h2>

    <form action="{{ route('materiasPrimas.update', $materiaPrima->idMateriaPrima) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $materiaPrima->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion', $materiaPrima->descripcion) }}</textarea>
        </div>

        <div class="form-group">
            <label for="unidad">Unidad:</label>
            <input type="text" class="form-control" id="unidad" name="unidad" value="{{ old('unidad', $materiaPrima->unidad) }}" required>
        </div>

        <div class="form-group">
            <label for="proveedor">Proveedor:</label>
            <select class="form-control" id="proveedor" name="idProveedor">
                <option value="">Seleccione un proveedor</option>
                @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->idProveedor }}" {{ $materiaPrima->proveedor && $materiaPrima->proveedor->idProveedor == $proveedor->idProveedor ? 'selected' : '' }}>
                    {{ $proveedor->nombreCompleto }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="almacen">Almacén:</label>
            <select class="form-control" id="almacen" name="idAlmacen">
                <option value="">Seleccione un almacén</option>
                @foreach ($almacen as $almacen)
                <option value="{{ $almacen->idAlmacen }}" {{ $materiaPrima->almacen && $materiaPrima->almacen->idAlmacen == $almacen->idAlmacen ? 'selected' : '' }}>
                    {{ $almacen->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $materiaPrima->stock) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Materia Prima</button>
    </form>
</div>
@endsection