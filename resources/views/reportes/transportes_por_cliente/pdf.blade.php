<!DOCTYPE html>
<html>
<head>
    <title>Transportes por Cliente</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Reporte: Transportes por Cliente</h2>

    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>ID Transporte</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Capacidad</th>
                <th>Unidad</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $item)
                <tr>
                    <td>{{ $item->nombreCliente }}</td>
                    <td>{{ $item->idTransporte }}</td>
                    <td>{{ $item->transporteDescripcion }}</td>
                    <td>{{ $item->tipo }}</td>
                    <td>{{ $item->capacidad }}</td>
                    <td>{{ $item->unidad }}</td>
                    <td>{{ ucfirst($item->estado) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
