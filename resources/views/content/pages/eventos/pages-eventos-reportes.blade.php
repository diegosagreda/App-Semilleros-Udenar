<body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css">
    <style>
        /* Agrega tus estilos aquí */
        body {
            font-family: Arial, sans-serif;
            margin: 0; /* Agrega margen cero para asegurarte de que no haya espacios innecesarios */
        }
        h1 {
            color: #333;
            font-size: 24px;
            text-align: center;
        }
        /* Agrega más estilos según tus necesidades */
        .event-details {
            margin-left: 20px; /* Agrega margen a la izquierda para mover los detalles del evento */
        }
        .user-profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
        .list-unstyled {
            list-style: none; /* Quitar los puntos de la lista */
            padding: 0; /* Quitar el relleno de la lista */
        }
        .list-unstyled li {
            margin-bottom: 10px; /* Agregar espacio entre elementos de la lista */
        }
        .list-unstyled li i {
            margin-right: 10px; /* Espacio entre el icono y el texto en la lista */
        }
    </style>
    <h1>Reporte de Evento</h1>
    <div class="event-details">
        <p class="fw-semibold mx-2" style="font-size: 25px; ">DETALLES DEL EVENTO</p>
        <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center">
                <i class="bx bx-key" style="color: rgb(160, 156, 37)"></i>
                <span class="fw-semibold mx-2">No#:</span>
                <span>{{$evento->codigo}}</span>
            </li>
            <li class="d-flex align-items-center">
                <i class="bx bx-calendar-alt" style="color: rgb(203, 45, 45)"></i>
                <span class="fw-semibold mx-2" class="fw-semibold mx-2" style="font-size: 20px; ">Evento:</span>
                <span style="">{{$evento->nombre}}</span><br><br>
                <span class="fw-semibold mx-2" class="fw-semibold mx-2" style="font-size: 20px; ">Fecha Inicio:</span>
                <span>{{$evento->fecha_inicio}}</span><br><br>
                <span class="fw-semibold mx-2" class="fw-semibold mx-2" style="font-size: 20px; ">Fecha Fin:</span>
                <span>{{$evento->fecha_fin}}</span><br><br>
                <span class="fw-semibold mx-2" style="font-size: 20px; ">Descripción:</span>
                <span>{{$evento->descripcion}}</span><br>
                {{-- <span class="fw-semibold mx-2">Nombre Proyecto:</span>
                <span>{{$proyecto->nomProyecto}}</span> --}}
            </li>
            <!-- Agrega los demás elementos de la lista -->
        </ul>
        {{-- <img alt="Event Image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" src="{{ asset('public/assets/eventos/' . $evento->foto) }}" alt="Foto del evento"> --}}
    </div>
</body>