<!DOCTYPE html>
<html>
<head>
    <title>Stock Actual por Almacén</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Reporte: Stock Actual por Almacén</h2>

    <table>
        <thead>
            <tr>
                <th>Almacén</th>
                <th>Materia Prima</th>
                <th>Stock Actual</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stock as $s)
                <tr>
                    <td>{{ $s->almacen }}</td>
                    <td>{{ $s->materia_prima }}</td>
                    <td>{{ $s->stock_actual }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
