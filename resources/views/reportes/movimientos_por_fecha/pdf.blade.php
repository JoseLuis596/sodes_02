<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Movimientos</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Movimientos del {{ \Carbon\Carbon::parse($fechaInicio)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($fechaFin)->format('d/m/Y') }}</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Materia Prima</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Descripción</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimientos as $m)
                <tr>
                    <td>{{ $m->idMovimiento }}</td>
                    <td>{{ $m->materia_prima }}</td>
                    <td>{{ ucfirst($m->tipo) }}</td>
                    <td>{{ $m->cantidad }}</td>
                    <td>{{ $m->descripcion }}</td>
                    <td>{{ \Carbon\Carbon::parse($m->fecha)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
