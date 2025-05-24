<!DOCTYPE html>
<html>
<head>
    <title>Pedidos por Cliente</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Pedidos del Cliente: {{ $cliente->nombre }}</h2>
    <table>
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->idPedido }}</td>
                    <td>{{ $pedido->producto }}</td>
                    <td>{{ $pedido->cantidad }}</td>
                    <td>{{ $pedido->estado }}</td>
                    <td>{{ \Carbon\Carbon::parse($pedido->fecha)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
