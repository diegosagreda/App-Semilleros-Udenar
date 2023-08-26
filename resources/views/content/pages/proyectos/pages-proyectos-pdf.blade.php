<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
    
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
    
        .header img {
            max-width: 100px;
            height: auto;
        }
    
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
    
        th, td {
            border: 1px solid #ccc;
            padding: 12px; /* Aumentado el espaciado interno */
            text-align: left;
        }
    
        th {
            background-color: #f2f2f2;
        }
    
        .semilleristas {
            list-style: disc;
            padding-left: 20px;
            margin-top: 5px; /* Agregado margen superior */
            margin-bottom: 5px; /* Agregado margen inferior */
        }
    
        .estado-propuesta,
        .estado-en-curso,
        .estado-terminado {
            padding: 6px 12px; /* Ajuste de espaciado en los estados */
            font-weight: bold;
            text-align: center;
            border-radius: 4px;
        }
    
        .estado-propuesta {
            background-color: #28a745; /* Verde */
            color: #fff;
        }
    
        .estado-en-curso {
            background-color: #ffc107; /* Amarillo */
            color: #fff;
        }
    
        .estado-terminado {
            background-color: #dc3545; /* Rojo */
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="header">
        <!-- <img src="/public/proyecto/logo.png" alt="Logo">-->
        <h1>Lista de Proyectos</h1>
    </div>

    <table>
        <thead>
            <tr>
                <th>Proyecto</th>
                <th>Tipo de Proyecto</th>
                <th>Estado</th>
                <th>Semilleristas</th>
                <th>Semillero</th>
                <th>Eventos</th>
            </tr>
        </thead>
        <tbody>
            @if (count($proyectos) > 0)
                @foreach ($proyectos as $proyecto)
                    <tr>
                        <td>{{ $proyecto->nomProyecto }}</td>
                        <td>{{ $proyecto->tipoProyecto }}</td>
                        <td class="
                            @if ($proyecto->estProyecto === 'Propuesta')
                                estado-propuesta
                            @elseif ($proyecto->estProyecto === 'En curso')
                                estado-en-curso
                            @else
                                estado-terminado
                            @endif">
                            {{ $proyecto->estProyecto }}
                        </td>
                        <td>
                            <ul class="semilleristas">
                                @foreach ($proyecto->semilleristas as $semillerista)
                                    <li>{{ $semillerista->nombre }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $proyecto->semillero->nombre }}</td>
                        <td>
                            <ul class="eventos">
                                @foreach ($proyecto->eventos as $evento)
                                    <li>{{ $evento->nombre }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">No hay proyectos registrados</td>
                </tr>
            @endif
        </tbody>
    </table>
    


</body>

</html>
