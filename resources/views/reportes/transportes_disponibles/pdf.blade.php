<!DOCTYPE html>
<html>
<head>
    <title>Transportes Disponibles</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Reporte: Transportes Disponibles</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Capacidad</th>
                <th>Unidad</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transportes as $transporte)
                <tr>
                    <td>{{ $transporte->idTransporte }}</td>
                    <td>{{ $transporte->descripcion }}</td>
                    <td>{{ $transporte->tipo }}</td>
                    <td>{{ $transporte->capacidad }}</td>
                    <td>{{ $transporte->unidad }}</td>
                    <td>{{ ucfirst($transporte->estado) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
