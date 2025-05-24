<!DOCTYPE html>
<html>
<head>
    <title>Productos por Proveedor</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Reporte: Productos por Proveedor</h2>

    <table>
        <thead>
            <tr>
                <th>Proveedor</th>
                <th>Materia Prima</th>
                <th>Unidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->proveedor }}</td>
                    <td>{{ $producto->materia_prima }}</td>
                    <td>{{ $producto->unidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
