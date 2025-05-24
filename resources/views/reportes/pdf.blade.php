<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>


    @if(count($data) > 0)
    <h2>Reporte: {{ $titulo ?? $data[0]->tipo ?? 'General' }}</h2>

    <table>
        <thead>
            <tr>
                @foreach($data[0] as $col => $value)
                <th>{{ ucfirst($col) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($data as $fila)
            <tr>
                @foreach($fila as $valor)
                <td>{{ $valor }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No hay datos disponibles para mostrar en el reporte.</p>
    @endif

</body>

</html>