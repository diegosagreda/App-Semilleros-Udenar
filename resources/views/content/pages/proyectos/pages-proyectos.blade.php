@extends('layouts/layoutMaster')

@section('title', 'Proyectos')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.25.0/dist/js/bootstrap-icons.min.js"></script>
    <link rel="stylesheet" href="{{ asset('proyecto/estilos/indexBotones.css') }}">
    <link rel="stylesheet" href="{{ asset('proyecto/estilos/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/jquery-sticky/jquery-sticky.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
@endsection



@section('content')
    <!DOCTYPE html>
    <html lang="en" class="no-js">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Proyectos</title>


        <!--[if IE]>
                  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
                 <![endif]-->
    </head>
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <body>

        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Gestión |</span> Proyectos
        </h4>

        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">

            <div class="container-fluid">
                <a class="navbar-brand" href="javascript:void(0)"><strong>Proyectos</strong></a>
                <a class="fas fa-file-pdf verPro" href="{{ route('proyectos.pdf') }}"></a>
            </div>
        </nav>
        {{-- Formulario --}}
        @php
            $switchValue = false; // Cambia esto a true o false según tu lógica
        @endphp
        <div class="custom-control custom-switch d-flex justify-content-end">
            <input type="checkbox" class="custom-control-input" id="customSwitch" {{ $switchValue ? 'checked' : '' }}>
            <label class="custom-control-label ml-3"
                for="customSwitch">{{ $switchValue ? 'Filtro Activado' : 'Filtro Desactivado' }}</label>
        </div>
        <div class="container">
            <div class="container">

                <div class="modal fade" id="modalBusqueda" tabindex="-1" aria-labelledby="modalBusquedaLabel"
                    aria-hidden="true">
                    <div class="modal-dialog  modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalBusquedaLabel">Busqueda de proyectos:</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="form_busqueda" action="{{ route('proyectos.buscar') }}" method="GET">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tipoProyecto">Tipo:</label>
                                                <select name="tipoProyecto" id="tipoProyecto" class="form-control">
                                                    <option value="">Seleccione tipo</option>
                                                    <option value="Investigacion">Investigacion</option>
                                                    <option value="Innovacion y Desarrollo">Innovacion y Desarrollo</option>
                                                    <option value="Emprendimiento">Emprendimiento</option>
                                                    <!-- Add more options as needed -->
                                                </select>
                                                <label for="tipoProyecto">Ultima búsqueda:</label>
                                                <label for="tipoProyecto">
                                                    @if (request('tipoProyecto') === 'Investigacion')
                                                        Investigación
                                                    @elseif(request('tipoProyecto') === 'Innovacion y Desarrollo')
                                                        Innovación y Desarrollo
                                                    @elseif(request('tipoProyecto') === 'Emprendimiento')
                                                        Emprendimiento
                                                    @else
                                                        <!-- Texto predeterminado cuando no se ha seleccionado nada -->
                                                        No se ha seleccionado ningún tipo de proyecto
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fecha_inicioPro">Fecha:</label>
                                                <input type="date" name="fecha_inicioPro" id="fecha_inicioPro"
                                                    class="form-control">
                                                <label for="fecha_inicioPro">Ultima fecha seleccionada:</label>
                                                <label for="fecha_inicioPro">
                                                    @if (request('fecha_inicioPro'))
                                                        {{ request('fecha_inicioPro') }}
                                                    @else
                                                        <!-- Texto predeterminado cuando no se ha seleccionado ninguna fecha -->
                                                        No se ha seleccionado ninguna fecha
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="estProyecto">Estado:</label>
                                                <select name="estProyecto" id="estProyecto" class="form-control">
                                                    <option value="">Seleccione estado</option>
                                                    <option value="Propuesta">Propuesta</option>
                                                    <option value="En curso">En curso</option>
                                                    <option value="Finalizado">Finalizado</option>
                                                    <!-- Add more options as needed -->
                                                </select>
                                                <label for="estProyecto">Ultima búsqueda:</label>
                                                <label for="estProyecto">
                                                    @if (request('estProyecto') === 'Propuesta')
                                                        Propuesta
                                                    @elseif(request('estProyecto') === 'En curso')
                                                        En curso
                                                    @elseif(request('estProyecto') === 'Finalizado')
                                                        Finalizado
                                                    @else
                                                        <!-- Texto predeterminado cuando no se ha seleccionado nada -->
                                                        No se ha seleccionado ningún estado
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary close-btn"
                                    data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" form="form_busqueda" class="boton custom-btn">
                                    <span class="bi bi-search fa-solid fa-magnifying-glass"></span> Buscar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <header class="header">
                    @role('admin')
                        <a class="btnA btn-outline-light" href="/proyectos/create"><i class="fas fa-plus-square"></i></a>
                        <div class="header">

                            <div class="search-box">
                                <button class="btn-search {{ $switchValue ? '' : 'disabled-btn' }}" id="btnAbrirModal"
                                    data-bs-toggle="modal" data-bs-target="#modalBusqueda">
                                    <i class="fas fa-search"></i>
                                </button>
                                <form action="{{ route('proyectos.buscar') }}">
                                    <div id="searchBoxContainer" class="d-none">
                                        <button type="button" class="btn-search2" id="buscarButton"><i
                                                class="fas fa-search"></i></button>
                                        <input type="text" class="input-search" name="nomProyecto" id="nomProyecto"
                                            placeholder="Buscar... ">
                                    </div>
                                </form>
                            </div>
                            <a class="fas fa-home verPro" href="{{ route('proyectos.index') }}"></a>
                        </div>
                    @endrole
                    @role('coordinador')
                        <a class="btnA btn-outline-light" href="/proyectos/create"><i class="fas fa-plus-square"></i></a>
                    @endrole

                </header>
                <section class="projects-section">
                    <div class="projects-grid">
                        @if (count($proyectos) > 0)
                            @php
                                // Definimos un diccionario con los nombres de las imágenes asociados a cada tipo de proyecto (en minúsculas)
                                $imagenesPorTipoProyecto = [
                                    'innovacion y desarrollo' => 'innovacion.png',
                                    'investigacion' => 'investigacion.png',
                                    'emprendimiento' => 'emprendimiento.png',
                                ];
                            @endphp
                            @foreach ($proyectos as $proyecto)
                                <div class="project-card">
                                    <div class="dropdown btn-pinned">
                                        <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                          <li>
                                            @role('admin')
                                            <a class="dropdown-item text-info" href="{{ route('proyectos.edit', $proyecto->codProyecto) }}">Editar</a>
                                            @endrole
                                            @role('coordinador')
                                            <a class="dropdown-item text-info" href="{{ route('proyectos.edit', $proyecto->codProyecto) }}">Editar</a>
                                            @endrole
                                            </li>
                                          <li>
                                            <form action="{{ url('proyectos/' . $proyecto->codProyecto) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                @role('admin')
                                                    <button type="button" class="dropdown-item text-danger delete-button">Eliminar</button>
                                                @endrole
                                                @role('coordinador')
                                                    <button type="button" class="dropdown-item text-danger delete-button">Eliminar</button>
                                                @endrole
                                            </form>
                                          </li>
                                        </ul>
                                      </div>
                                    <h3 class="project-title">{{ $proyecto->nomProyecto }}</h3>
                                    @php
                                        // Convertimos el tipo de proyecto a minúsculas para que coincida con las claves del diccionario
                                        $tipoProyecto = strtolower($proyecto->tipoProyecto);
                                        
                                        // Verificamos si el tipo de proyecto existe en el diccionario antes de acceder a la imagen
                                        $imagen = $imagenesPorTipoProyecto[$tipoProyecto] ?? 'default.jpg'; // Usamos 'default.jpg' si no hay imagen para ese tipo de proyecto
                                    @endphp
                                    <img src="{{ asset('proyecto/' . $imagen) }}" alt="{{ $proyecto->tipoProyecto }}"
                                        class="project-image">
                                    <p class="project-type">{{ $proyecto->tipoProyecto }}</p>
                                    <p
                                        class="project-status @if ($proyecto->estProyecto === 'Propuesta') en-progreso @elseif($proyecto->estProyecto === 'En curso') terminado @else pendiente @endif">
                                        {{ $proyecto->estProyecto }}</p>
                                    <div class="project-actions">
                                        <a href="{{ route('proyectos.show', $proyecto->codProyecto) }}"
                                            class="btn btn-primary">Ver detalles</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning" role="alert">

                                @if ($tipo || $fecha || $estado || $nombre)
                                    <p>No se encontraron resultados para los filtros seleccionados.</p>
                                @else
                                    <p>No hay proyectos registrados</p>
                                @endif
                            </div>
                        @endif
                    </div>
                </section>
                <footer class="footer">
                    <p>Universidad de Nariño</p>
                    <p>San juan de Pasto</p>
                    <p>&copy;2023</p>
                </footer>
            </div>
            <!-- Scripts -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const switchInput = document.getElementById("customSwitch");
                    const switchLabel = document.querySelector('[for="customSwitch"]');
                    const modalButton = document.getElementById("btnAbrirModal");
                    const searchBoxContainer = document.getElementById("searchBoxContainer");
                    const modalInstance = new bootstrap.Modal(document.getElementById("modalBusqueda"));

                    switchInput.addEventListener("change", function() {
                        if (this.checked) {
                            switchLabel.textContent = 'Filtro Busqueda Activado';
                            searchBoxContainer.classList.add("d-none");
                            modalButton.classList.remove("disabled-btn");
                            modalButton.removeAttribute("disabled");
                        } else {
                            switchLabel.textContent = 'Filtro Busqueda Desactivado';
                            searchBoxContainer.classList.remove("d-none");
                            modalButton.classList.add("disabled-btn");
                            modalButton.setAttribute("disabled", "disabled");
                            if (modalInstance._isShown) {
                                modalInstance.hide();
                            }
                        }
                        toggleOriginalButton();
                    });

                    modalButton.addEventListener("click", function(event) {
                        if (switchInput.checked) {
                            modalInstance.show();
                        }
                    });

                    function toggleOriginalButton() {
                        if (switchInput.checked) {
                            modalButton.style.display = "block";
                        } else {
                            modalButton.style.display = "none";
                        }
                    }

                    // Llamamos al evento change al cargar la página para que el texto inicial esté configurado correctamente
                    switchInput.dispatchEvent(new Event('change'));
                });
            </script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const buscarButton = document.getElementById("buscarButton");
                    buscarButton.addEventListener("click", function() {
                        const nombreProyecto = document.getElementById("nomProyecto").value;
                        console.log("Valor de nombreProyecto:", nombreProyecto);
                    });
                });
            </script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const deleteButtons = document.querySelectorAll('.delete-button');
            
                    deleteButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            Swal.fire({
                                title: '¿Estás seguro?',
                                text: '¡No podrás revertir esto!',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Sí, eliminarlo'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // En lugar de enviar el formulario aquí, puedes agregar tu lógica para enviar el formulario mediante AJAX
                                    // Por ejemplo, usando fetch o Axios
                                    const form = button.closest('.delete-form');
                                    form.submit();
            
                                    Swal.fire(
                                        '¡Eliminado!',
                                        'Tu proyecto ha sido eliminado.',
                                        'success'
                                    );
                                }
                            });
                        });
                    });
                });
            </script>         
        </div>
    </body>

    </html>

    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .botones-container {
            text-align: center;
        }

        .header {
            display: flex;
            /* Utilizamos flexbox para alinear elementos en línea */
            align-items: center;
            /* Centramos verticalmente los elementos */
        }

        .disabled-btn {
            background-color: gray;
            pointer-events: none;
        }

        * {
            box-sizing: border-box;
        }

        .input-search {
            height: 50px;
            width: 50px;
            border-style: none;
            padding: 10px;
            font-size: 18px;
            letter-spacing: 2px;
            outline: none;
            border-radius: 25px;
            transition: all .5s ease-in-out;
            background-color: #91a4a5;
            padding-right: 40px;
            color: #000000;
        }

        .input-search::placeholder {
            color: rgba(3, 2, 2, 0.5);
            font-size: 18px;
            letter-spacing: 2px;
            font-weight: 100;
        }

        .btn-search2 {
            width: 50px;
            height: 50px;
            border-style: none;
            font-size: 20px;
            font-weight: bold;
            outline: none;
            cursor: pointer;
            border-radius: 50%;
            position: absolute;
            right: 0px;
            color: #000000;
            background-color: transparent;
            pointer-events: painted;
        }

        .btn-search2:focus~.input-search {
            width: 300px;
            border-radius: 0px;
            background-color: transparent;
            border-bottom: 1px solid rgba(255, 255, 255, 0.096);
            transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
        }

        .input-search:focus {
            width: 300px;
            border-radius: 0px;
            background-color: transparent;
            border-bottom: 1px solid rgba(0, 0, 0, 0.5);
            transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
        }


        .search-box {
            width: fit-content;
            height: fit-content;
            position: relative;
            /* Espacio entre los elementos */
            margin-right: 20px;
        }

        .header {
            display: flex;
            align-items: center;
        }

        .btn-search,
        .verPro {
            width: 50px;
            height: 50px;
            border-style: none;
            font-size: 20px;
            font-weight: bold;
            outline: none;
            cursor: pointer;
            border-radius: 50%;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #000000;
            background-color: #91a4a5;
            pointer-events: painted;
            transition: all 500ms cubic-bezier(0, 0.11, 0.35, 2);
        }

        .btn-search:focus,
        .verPro:focus {
            width: 100px;
            border-radius: 0;
            background-color: transparent;
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
        }





        .close-btn {
            font-size: 1.5rem;
            color: #91a4a5;
            /* Color del icono del botón */
            opacity: 0.5;
            /* Opacidad inicial del botón */
            background-color: transparent;
            /* Fondo transparente */
            border: none;
            /* Sin borde */
            outline: none;
            /* Sin contorno al hacer clic */
        }

        .close-btn:hover {
            opacity: 1;
            /* Opacidad al pasar el mouse por encima */
        }

        .close-btn:focus {
            opacity: 1;
            /* Opacidad al hacer clic */
        }
    </style>
    <style>
        .btnA {
            display: inline-block;
            padding: 10px 20px;
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
        }

        .btnA:hover {
            background-color: #91a4a5;
            color: #fff;
            transform: scale(1.1);
        }

        .btnA i {
            font-size: 40px;
        }
    </style>


@endsection
