
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Generar Reporte</h2>

    <form method="POST" action="{{ route('reportes.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Reporte</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Reporte</label>
            <select name="tipo" class="form-select" required>
                <option value="">Seleccione un tipo</option>
                <option value="Control Stock Etapa">Control Stock Etapa</option>
                <option value="Producción Diaria">Producción Diaria</option>
                <option value="Clientes Frecuentes">Clientes Frecuentes</option>
        <!--        <option value="Pedidos por Cliente">Pedidos por Cliente</option>  -->
             <!--   <option value="Movimientos por Fecha">Movimientos por Fecha</option> -->
                <option value="Stock por Almacén">Stock por Almacén</option>
                <option value="Productos por Proveedor">Productos por Proveedor</option>
           <!--     <option value="Transportes Disponibles">Transportes Disponibles</option>-->
           <!--     <option value="Transportes por Cliente">Transportes por Cliente</option>-->
            </select>
        </div>

        <button type="submit" class="btn btn-success">Generar Reporte</button>
        <a href="{{ route('reportes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
