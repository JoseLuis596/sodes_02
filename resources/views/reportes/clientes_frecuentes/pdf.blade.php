<!DOCTYPE html>
<html>
<head>
    <title>Reporte Clientes Frecuentes</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #f8f8f8; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Reporte de Clientes Frecuentes</h2>
    <table>
        <thead>
            <tr>
                <th>ID Cliente</th>
                <th>Nombre</th>
                <th>Total Pedidos</th>
                <th>Volumen Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->idCliente }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->total_pedidos }}</td>
                    <td>{{ $cliente->volumen_total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
