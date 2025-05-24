
<!DOCTYPE html>
<html>
<head>
    <title>Producción Diaria</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #999; padding: 6px; text-align: center; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Reporte de Producción Diaria - {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}</h2>
    <table>
        <thead>
            <tr>
                <th>Tipo de Producto</th>
                <th>Total Producido</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $item)
                <tr>
                    <td>{{ $item->tipo_producto }}</td>
                    <td>{{ $item->total_producido }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
