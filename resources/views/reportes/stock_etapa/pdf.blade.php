<!DOCTYPE html>
<html>
<head>
    <title>Reporte Stock por Etapa</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #999; padding: 5px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Reporte: Stock por Etapa</h2>
    <table>
        <thead>
            <tr>
                <th>Almacén</th>
                <th>Materia Prima</th>
                <th>Capacidad Máxima</th>
                <th>Stock</th>
                <th>% Ocupado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $dato)
                <tr>
                    <td>{{ $dato->nombreAlmacen }}</td>
                    <td>{{ $dato->nombreMateriaPrima }}</td>
                    <td>{{ $dato->capacidad_maxima }}</td>
                    <td>{{ $dato->stock }}</td>
                    <td>{{ round($dato->porcentajeOcupado, 2) }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
