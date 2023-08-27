<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Evento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }
        .event-details {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }
        .table th {
            width: 150px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
        .table td {
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="event-details">
            <p class="text-right">Fecha: {{ date('d/m/Y') }}</p>
            <p class="text-left">Hora: {{ date('H:i:s') }}</p>
        </div>
    </div>
    <div class="container">
        <div class="event-details">
            
            <h2> Evento: {{$evento->nombre}}</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <th>No#</th>
                        <td>{{$evento->codigo}}</td>
                    </tr>
                    <tr>
                        <th>Evento</th>
                        <td>{{$evento->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Fecha Inicio</th>
                        <td>{{$evento->fecha_inicio}}</td>
                    </tr>
                    <tr>
                        <th>Fecha Fin</th>
                        <td>{{$evento->fecha_fin}}</td>
                    </tr>
                    <tr>
                        <th>Descripción</th>
                        <td>{{$evento->descripcion}}</td>
                    </tr>
                    <tr>
                        <th>Observaciones</th>
                        <td>{{$evento->observaciones}}</td>
                    </tr>
                <tr>
                    <th>Lugar </th>
                    <td>{{$evento->lugar}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
