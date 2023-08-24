@extends('layouts/layoutMaster')

@section('title', 'Crear Proyecto')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/jquery-sticky/jquery-sticky.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection

@section('page-script')
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection


@section('content')
    @if ($errors->any())
        <div class="error-container">
            <ul class="error-list">
                @foreach ($errors->all() as $item)
                    <li class="error-item">{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif




    <!-- Sticky Actions -->
    <div class="row">

        <div class="col-12">

            <div class="card">

                <form action="{{ route('proyectos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div
                        class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                        <h5 class="card-title mb-sm-0 me-2">Registro de Proyecto</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-lg-8 mx-auto">

                                <fieldset class="border p-4 mb-5">
                                    <legend class="w-auto">Información del Proyecto</legend>
                                    <div class="row g-3">
                                        <input type="hidden" name="numero_integrantes" id="numero_integrantes"
                                            value="{{ isset($proyecto) ? old('numero_integrantes', $proyecto->numero_integrantes) : old('numero_integrantes') }}">

                                            <div class="mb-3">
                                                <h5>Seleccione el número de integrantes:</h5>
                                                <div class="row">
                                                    @for ($i = 1; $i <= min(5, count($semilleristas)); $i++)
                                                        <div class="col-2">
                                                            <button type="button"
                                                                class="btn btn-primary btn-lg btn-block numero-btn"
                                                                data-value="{{ $i }}" data-required="{{ $i }}">{{ $i }}</button>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>

                                        <button id="mostrar-semilleristas" type="button" data-toggle="modal"
                                            data-target="#modal-semilleristas">Mostrar Semilleristas</button>

                                        <div class="modal fade" id="modal-semilleristas" tabindex="-1" role="dialog"
                                            aria-labelledby="modal-semilleristas-label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="modal-semilleristas-label">Semilleristas
                                                        </h2>

                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Cerrar">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-group mb-3">
                                                            <input id="searchInput" type="text" class="form-control"
                                                                placeholder="Buscar por Identificacion o Nombre">
                                                            <div class="input-group-append">
                                                                <button id="searchButton" class="btn btn-outline-secondary"
                                                                    type="button">Buscar</button>
                                                                    <button id="mostrar-todos" type="button" class="btn btn-outline-secondary">
                                                                        <i class="fas fa-list"></i>
                                                                    </button>
                                                            </div>
                                                        </div>
                                                        <div id="lista-semilleristas"></div>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Identificación</th>
                                                                    <th>Nombre</th>
                                                                    <th>Seleccionar</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($semilleristas as $index => $semillerista)
                                                                    <tr>
                                                                        <td>{{ $index + 1 }}</td>
                                                                        <td>{{ $semillerista->identificacion }}</td>
                                                                        <td>{{ $semillerista->nombre }}</td>
                                                                        <td>
                                                                        
                                                                            <label>
                                                                                <input type="checkbox"
                                                                                    class="checkbox-semillerista"
                                                                                    name="seleccionados[]"
                                                                                    value="{{ $semillerista->identificacion }}">
                                                                                    <span class="checkbox-custom"></span>
                                                                            </label>
                                                                    
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <label class="form-label" for="codProyecto">Código</label>
                                            <input type="text" id="codProyecto" name="codProyecto" class="form-control"
                                                value="{{ isset($proyecto) ? old('codProyecto', $proyecto->codProyecto) : old('codProyecto') }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="nomProyecto">Título del Proyecto</label>
                                            <input type="text" id="nomProyecto" name="nomProyecto" class="form-control"
                                                value="{{ isset($proyecto) ? old('nomProyecto', $proyecto->nomProyecto) : old('nomProyecto') }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="tipoProyecto">Tipo</label>
                                            <select id="tipoProyecto" name="tipoProyecto" class="form-control">
                                                <option value="">Seleccionar tipo</option>
                                                <option value="Investigacion"
                                                    {{ isset($proyecto)
                                                        ? ($proyecto->tipoProyecto == 'Investigacion'
                                                            ? 'selected'
                                                            : '')
                                                        : (old('tipoProyecto') == 'Investigacion'
                                                            ? 'selected'
                                                            : '') }}>
                                                    Investigación</option>
                                                <option value="Innovacion y Desarrollo"
                                                    {{ isset($proyecto)
                                                        ? ($proyecto->tipoProyecto == 'Innovacion y Desarrollo'
                                                            ? 'selected'
                                                            : '')
                                                        : (old('tipoProyecto') == 'Innovacion y Desarrollo'
                                                            ? 'selected'
                                                            : '') }}>
                                                    Innovación y Desarrollo</option>
                                                <option value="Emprendimiento"
                                                    {{ isset($proyecto)
                                                        ? ($proyecto->tipoProyecto == 'Emprendimiento'
                                                            ? 'selected'
                                                            : '')
                                                        : (old('tipoProyecto') == 'Emprendimiento'
                                                            ? 'selected'
                                                            : '') }}>
                                                    Emprendimiento</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="estProyecto">Estado</label>
                                            <select id="estProyecto" name="estProyecto" class="form-control">
                                                <option value="">Seleccionar estado</option>
                                                <option value="Propuesta"
                                                    {{ isset($proyecto)
                                                        ? ($proyecto->estProyecto == 'Propuesta'
                                                            ? 'selected'
                                                            : '')
                                                        : (old('estProyecto') == 'Propuesta'
                                                            ? 'selected'
                                                            : '') }}>
                                                    Propuesta</option>
                                                <option value="En curso"
                                                    {{ isset($proyecto)
                                                        ? ($proyecto->estProyecto == 'En curso'
                                                            ? 'selected'
                                                            : '')
                                                        : (old('estProyecto') == 'En curso'
                                                            ? 'selected'
                                                            : '') }}>
                                                    En curso</option>
                                                <option value="Finalizado"
                                                    {{ isset($proyecto)
                                                        ? ($proyecto->estProyecto == 'Finalizado'
                                                            ? 'selected'
                                                            : '')
                                                        : (old('estProyecto') == 'Finalizado'
                                                            ? 'selected'
                                                            : '') }}>
                                                    Finalizado</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="fecha_inicioPro">Fecha de Inicio</label>
                                            <input type="date" id="fecha_inicioPro" name="fecha_inicioPro"
                                                class="form-control"
                                                value="{{ isset($proyecto) ? old('fecha_inicioPro', $proyecto->fecha_inicioPro) : old('fecha_inicioPro') }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="fecha_finPro">Fecha de Finalización</label>
                                            <input type="date" id="fecha_finPro" name="fecha_finPro"
                                                class="form-control"
                                                value="{{ isset($proyecto) ? old('fecha_finPro', $proyecto->fecha_finPro) : old('fecha_finPro') }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="PropProyecto">Propuesta</label>
                                            <div class="file-input-container">
                                                <input type="file" id="PropProyecto" name="PropProyecto"
                                                    class="form-control" onchange="showFileName('PropProyecto')" />
                                                <label for="PropProyecto" class="file-label">
                                                    <span class="file-icon">
                                                        <i class="far fa-file"></i>
                                                    </span>
                                                    <span class="file-name">Seleccionar archivo...</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="Proyecto_final">Proyecto Final</label>
                                            <div class="file-input-container">
                                                <input type="file" id="Proyecto_final" name="Proyecto_final"
                                                    class="form-control" onchange="showFileName('Proyecto_final')" />
                                                <label for="Proyecto_final" class="file-label">
                                                    <span class="file-icon">
                                                        <i class="far fa-file"></i>
                                                    </span>
                                                    <span class="file-name">Seleccionar archivo...</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                @role('admin')
                                    <div class="col-md-6">
                                        <label class="form-label" for="semillero_id">Semillero</label>
                                        <select id="semillero_id" name="semillero_id" class="form-control">
                                            <option value="">Seleccionar semillero</option>
                                            @foreach ($semilleros as $semillero)
                                                <option value="{{ $semillero->id }}"
                                                    {{ isset($proyecto)
                                                        ? ($proyecto->semillero_id == $semillero->id
                                                            ? 'selected'
                                                            : '')
                                                        : (old('semillero_id') == $semillero->id
                                                            ? 'selected'
                                                            : '') }}>
                                                    {{ $semillero->nombre }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                @endrole

                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="/proyectos" class="btn btn-danger">
                            <span class="align-middle">Cancelar</span>
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <!--<script>
                $(document).ready(function () {
                    var selectedRequired = 0; // Almacenará la cantidad requerida de semilleristas
                    
                    $(".numero-btn").click(function () {
                        selectedRequired = parseInt($(this).data("required"));
                    });
                    
                    $(".checkbox-semillerista").change(function () {
                        var selectedCount = $(".checkbox-semillerista:checked").length;
                        if (selectedCount >= selectedRequired) {
                            $(".checkbox-semillerista:not(:checked)").prop("disabled", true);
                        } else {
                            $(".checkbox-semillerista").prop("disabled", false);
                        }
                    });
                    
                    $("#modal-semilleristas").on("hide.bs.modal", function (e) {
                        var selectedCount = $(".checkbox-semillerista:checked").length;
                        if (selectedCount !== selectedRequired) {
                            e.preventDefault();
                            alert("Debes seleccionar exactamente " + selectedRequired + " semilleristas.");
                        }
                    });
                });
            </script>-->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const searchButton = document.getElementById("searchButton");
                    const searchInput = document.getElementById("searchInput");
                    const tableBody = document.querySelector(".table tbody");
                    const checkboxes = document.querySelectorAll(".checkbox-semillerista");
                    const modal = document.getElementById("modal-semilleristas");
                    const showAllButton = document.getElementById("mostrar-todos");
            
                    // Evitar el envío del formulario dentro del modal al presionar Enter
                    modal.addEventListener('keydown', function(event) {
                        if (event.key === 'Enter') {
                            event.preventDefault();
                        }
                    });
            
                    searchButton.addEventListener("click", function() {
                        const searchTerm = searchInput.value.toLowerCase();
                        tableBody.innerHTML = ""; // Limpiar la tabla antes de mostrar resultados
            
                        checkboxes.forEach(function(checkbox) {
                            const row = checkbox.closest("tr");
                            const identificacion = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
                            const nombre = row.querySelector("td:nth-child(3)").textContent.toLowerCase();
            
                            if (identificacion.includes(searchTerm) || nombre.includes(searchTerm)) {
                                tableBody.appendChild(row.cloneNode(true));
                            }
                        });
                    });
            
                    function showAll() {
                        tableBody.innerHTML = ""; // Limpiar la tabla antes de mostrar todos los elementos
            
                        checkboxes.forEach(function(checkbox) {
                            const row = checkbox.closest("tr");
                            tableBody.appendChild(row.cloneNode(true));
                        });
                    }
                    showAllButton.addEventListener("click", function() {
                        showAll();
                    });
                });
            </script>
            

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            var numSeleccionados = 0;

            $('.numero-btn').click(function() {
                numSeleccionados = parseInt($(this).attr('data-value'));

                // Habilitar todas las casillas de verificación y reiniciar su estado
                $('input[type="checkbox"]').prop('disabled', false).prop('checked', false);
            });

            $('input[type="checkbox"]').click(function() {
                var checkboxesSeleccionados = $('input[type="checkbox"]:checked').length;

                // Deshabilitar las casillas no seleccionadas si se alcanza el número seleccionado
                if (checkboxesSeleccionados >= numSeleccionados) {
                    $('input[type="checkbox"]').not(':checked').prop('disabled', true);
                } else {
                    // Habilitar todas las casillas de verificación si no se ha alcanzado el número seleccionado
                    $('input[type="checkbox"]').prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const numeroButtons = document.querySelectorAll('.numero-btn');
            const numeroInput = document.getElementById('numero_integrantes');

            // Al cargar la página, asignar la clase 'selected' al botón correspondiente al valor del campo oculto
            const selectedValue = numeroInput.value;
            if (selectedValue) {
                numeroButtons.forEach(button => {
                    if (button.getAttribute('data-value') === selectedValue) {
                        button.classList.add('selected');
                    }
                });
            }

            numeroButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const selectedValue = this.getAttribute('data-value');
                    numeroInput.value = selectedValue;

                    // Remover la clase 'selected' de todos los botones
                    numeroButtons.forEach(btn => btn.classList.remove('selected'));
                    // Agregar la clase 'selected' solo al botón seleccionado
                    this.classList.add('selected');
                });
            });
        });
    </script>
    <script>
        function showFileName(inputId) {
            const fileInput = document.getElementById(inputId);
            const fileLabel = fileInput.nextElementSibling;
            const fileNameSpan = fileLabel.querySelector('.file-name');

            if (fileInput.validity.valid && fileInput.files.length > 0) {
                fileNameSpan.innerText = fileInput.files[0].name;
            } else {
                fileNameSpan.innerText = "Seleccionar archivo...";
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInputs = document.querySelectorAll('input[type="file"]');
            const fileIcons = document.querySelectorAll('.file-icon i');

            fileInputs.forEach((input, index) => {
                input.addEventListener('change', function() {
                    const fileName = input.value;
                    const fileExtension = fileName.split('.').pop().toLowerCase();

                    if (fileExtension === 'pdf') {
                        fileIcons[index].className = 'far fa-file-pdf';
                    } else if (['jpg', 'jpeg', 'png', 'gif', 'bmp'].includes(fileExtension)) {
                        fileIcons[index].className = 'far fa-file-image';
                    } else if (['doc', 'docx'].includes(fileExtension)) {
                        fileIcons[index].className = 'far fa-file-word';
                    } else {
                        fileIcons[index].className =
                            'far fa-file'; // Icono predeterminado si la extensión no coincide
                    }
                });
            });
        });
    </script>
    <script>
        // Obtener elementos
        const btnMostrar = document.getElementById("mostrar-semilleristas");
        const modal = document.getElementById("modal-semilleristas");
        const listaSemilleristas = document.getElementById("lista-semilleristas");

        // Mostrar el modal al hacer clic en el botón
        btnMostrar.addEventListener("click", () => {
            modal.style.display = "block";
        });

        // Cerrar el modal al hacer clic en el botón de cerrar
        const btnCerrar = document.querySelector(".cerrarSemillerista");
        btnCerrar.addEventListener("click", () => {
            modal.style.display = "none";
        });

        // Cerrar el modal al hacer clic fuera del contenido del modal
        window.addEventListener("click", (event) => {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    </script>
    <script>
        // Obtener todos los botones de número
        const numerosBtn = document.querySelectorAll('.numero-btn');

        // Botón para mostrar los semilleristas
        const btnMostrarSemilleristas = document.getElementById('mostrar-semilleristas');

        // Deshabilitar el botón de mostrar semilleristas al cargar la página
        btnMostrarSemilleristas.setAttribute('disabled', 'true');

        // Manejar el clic en los botones de número
        numerosBtn.forEach((btn) => {
            btn.addEventListener('click', () => {
                // Obtener el valor del número seleccionado
                const numeroSeleccionado = parseInt(btn.getAttribute('data-value'));

                // Habilitar el botón de mostrar semilleristas si se seleccionó un número
                if (!isNaN(numeroSeleccionado)) {
                    btnMostrarSemilleristas.removeAttribute('disabled');
                } else {
                    btnMostrarSemilleristas.setAttribute('disabled', 'true');
                }
            });
        });
    </script>
    <style>
        /* Estilo personalizado para el checkbox */
        .checkbox-semillerista {
            display: none; /* Oculta el checkbox real */
        }
    
        /* Estilo para el contenedor del checkbox personalizado */
        .checkbox-custom {
            width: 18px;
            height: 18px;
            background-color: white; /* Color de fondo del checkbox */
            border: 2px solid #ccc;
            border-radius: 4px;
            display: inline-block;
            position: relative;
        }
    
        /* Estilo para el marcador de verificación (cuando está marcado) */
        .checkbox-custom::before {
            content: '\2713'; /* Símbolo de marca de verificación */
            color: green; /* Color del marcador de verificación */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
            visibility: hidden;
        }
    
        /* Cambia la apariencia del marcador de verificación cuando el checkbox está marcado */
        .checkbox-semillerista:checked + .checkbox-custom::before {
            visibility: visible;
        }
    </style>
    <style>
        /* Estilo para el modal */
        .modalSemillerista {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            /* Asegura que el modal esté en la parte superior */
        }

        .modal-content-semillerista {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1001;
            width: 60%;
            /* Ajusta el ancho del modal según tu preferencia */
            max-height: 60%;
            /* Ajusta la altura máxima del modal según tu preferencia */
            overflow: auto;
        }

        /* Estilo para el botón */
        /* Estilo para el botón */
        #mostrar-semilleristas {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        #mostrar-semilleristas:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        /* Efecto de hover */
        #mostrar-semilleristas:hover:not(:disabled) {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        /* Estilo para el botón de cerrar */
        .cerrarSemillerista {
            float: right;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .cerrarSemillerista:hover {
            color: red;
        }

        /* Estilo para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow-y: auto;
            /* Agregar barra de desplazamiento vertical si el contenido excede la altura */
            max-height: 300px;
            /* Ajustar la altura máxima según tu preferencia */
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .checkbox-cell {
            text-align: center;
        }

        /* Estilo para las casillas de verificación */
        .checkbox-semillerista {
            margin: 0;
            padding: 0;
        }
    </style>
    <style>
        .file-input-container {
            position: relative;
        }

        .file-input-container input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            z-index: 1;
        }

        .file-label {
            display: inline-block;
            cursor: pointer;
        }

        .file-icon {
            display: none;
        }

        .file-input-container input[type="file"]:valid+.file-label .file-icon {
            display: inline-block;
            font-size: 2em;
            /* Tamaño del icono - ajusta según tus preferencias */
        }

        .file-input-container input[type="file"]:valid+.file-label .file-name::after {
            content: attr(data-file-name);
            color: #333;
            /* Cambia el color según tus preferencias */
            margin-left: 5px;
            /* Espacio entre el icono y el texto - ajusta según tus preferencias */
        }

        .file-input-container input[type="file"]:not(:valid)+.file-label .file-icon {
            display: none;
        }

        .error-container {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .error-heading {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .error-list {
            list-style-type: disc;
            margin-left: 20px;
        }

        .error-item {
            margin-bottom: 5px;
        }

        /* Estilos para los botones */
        .numero-btn {
            font-size: 18px;
            border-radius: 50px;
            padding: 15px 20px;
            margin: 5px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Estilo para el botón seleccionado */
        .numero-btn.selected {
            background-color: #28a745;
            /* Color del botón seleccionado */
            border: 2px solid #fff;
            /* Borde blanco para resaltar el botón seleccionado */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            /* Sombra para resaltar el botón seleccionado */
        }

        /* Efecto hover */
        .numero-btn:hover {
            background-color: #007bff;
            /* Cambiar al color deseado */
        }
    </style>
    <!-- /Sticky Actions -->
@endsection
