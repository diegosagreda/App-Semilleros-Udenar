@extends('layouts/layoutMaster')

@section('title', 'Editar Proyecto')

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
            <h4 class="error-heading">¡Oops! Se encontraron errores:</h4>
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
                <form action="{{ route('proyectos.update', $proyecto->codProyecto) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div
                        class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                        <h5 class="card-title mb-sm-0 me-2">Edicion del proyecto</h5>

                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <fieldset class="border p-4 mb-5">

                                    <legend class="w-auto">Información del Proyecto</legend>

                                    <div class="row g-3">
                                        <input type="hidden" id="numero_integrantes" name="numero_integrantes"
                                            value="{{ old('numero_integrantes', $proyecto->numero_integrantes) ?? '' }}">

                                        <div class="mb-3">
                                            <h5>Seleccione el número de integrantes:</h5>
                                            <div class="row">
                                                @for ($i = 1; $i <= min(5, count($semilleristas)); $i++)
                                                    <div class="col-2">
                                                        <button type="button"
                                                            class="btn btn-primary btn-lg btn-block numero-btn"
                                                            data-value="{{ $i }}">{{ $i }}</button>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <button id="mostrar-semilleristas-modal" type="button">Mostrar Semilleristas</button>
                                        <div id="modal-semilleristas" class="modalSemillerista">
                                            <div class="modal-content-semillerista">
                                                <span class="cerrarSemillerista">&times;</span>
                                                <h2>Semilleristas</h2>
                                                <table>
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
                                                                    <input type="checkbox" class="checkbox-semillerista"
                                                                        name="seleccionados[]" value="{{ $semillerista->identificacion }}"
                                                                        {{ in_array($semillerista->identificacion, $proyecto->semilleristas->pluck('identificacion')->toArray()) ? 'checked' : '' }}>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label" for="codProyecto">Código</label>
                                            <input type="text" id="codProyecto" name="codProyecto" class="form-control"
                                                value="{{ $proyecto->codProyecto }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="nomProyecto">Título del Proyecto</label>
                                            <input type="text" id="nomProyecto" name="nomProyecto" class="form-control"
                                                value="{{ $proyecto->nomProyecto }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="estProyecto">Tipo de proyecto</i></b></label>
                                            <select id="tipoProyecto" name="tipoProyecto" class="form-control">
                                                <option value="">Seleccionar tipo de proyecto</option>
                                                <option value="Investigacion"
                                                    @if ($proyecto->tipoProyecto === 'Investigacion') selected @endif>Investigación</option>
                                                <option value="Innovacion y Desarrollo"
                                                    @if ($proyecto->tipoProyecto === 'Innovacion y Desarrollo') selected @endif>Innovación y
                                                    Desarrollo</option>
                                                <option value="Emprendimiento"
                                                    @if ($proyecto->tipoProyecto === 'Emprendimiento') selected @endif>Emprendimiento
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="estProyecto">Estado De proyecto</i></b></label>
                                            <select id="estProyecto" name="estProyecto" class="form-control">
                                                <option value="">Seleccionar estado</option>
                                                <option value="Propuesta" @if ($proyecto->estProyecto === 'Propuesta') selected @endif>
                                                    Propuesta</option>
                                                <option value="En curso" @if ($proyecto->estProyecto === 'En curso') selected @endif>
                                                    En curso</option>
                                                <option value="Finalizado"
                                                    @if ($proyecto->estProyecto === 'Finalizado') selected @endif>Finalizado</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="fecha_inicioPro">Fecha de Inicio</label>
                                            <input type="date" id="fecha_inicioPro" name="fecha_inicioPro"
                                                class="form-control" value="{{ $proyecto->fecha_inicioPro }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="fecha_finPro">Fecha de Finalización</label>
                                            <input type="date" id="fecha_finPro" name="fecha_finPro" class="form-control"
                                                value="{{ $proyecto->fecha_finPro }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="PropProyecto">Propuesta</label>
                                            <div class="file-input-container">
                                                <input type="file" id="PropProyecto" name="PropProyecto"
                                                    class="form-control" onchange="showFileName(this)" />
                                                <label for="PropProyecto" class="file-label">
                                                    <span class="file-icon">
                                                        <i class="fas fa-file-alt"></i>
                                                    </span>
                                                    <span class="file-name">
                                                        @if (isset($proyecto->PropProyecto))
                                                            {{ $proyecto->nombre_archivo_original_propuesta ?? 'Seleccionar archivo...' }}
                                                        @else
                                                            Seleccionar archivo...
                                                        @endif
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="Proyecto_final">Proyecto Final</label>
                                            <div class="file-input-container">
                                                <input type="file" id="Proyecto_final" name="Proyecto_final"
                                                    class="form-control" onchange="showFileName(this)" />
                                                <label for="Proyecto_final" class="file-label">
                                                    <span class="file-icon">
                                                        <i class="fas fa-file-alt"></i>
                                                    </span>
                                                    <span class="file-name">
                                                        @if (isset($proyecto->Proyecto_final))
                                                            {{ $proyecto->nombre_archivo_original_proyecto_final ?? 'Seleccionar archivo...' }}
                                                        @else
                                                            Seleccionar archivo...
                                                        @endif
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                </fieldset>
                                <div class="col-md-6">
                                    <label class="form-label" for="semillero_id">Seleccione nuevo semillero:</label>
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
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="/proyectos" class="btn btn-danger">
                            <span class="align-middle">Cancelar</span>
                        </a>
                        <button type="submit" class="btn btn-primary"> Guardar</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const numeroButtons = document.querySelectorAll('.numero-btn');
            const numeroInput = document.getElementById('numero_integrantes');
            const checkboxes = document.querySelectorAll('.checkbox-semillerista');

            function updateSelectedCount() {
                const numSeleccionados = parseInt(numeroInput.value);
                let checkboxesSeleccionados = 0;

                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        checkboxesSeleccionados++;
                    }
                });

                checkboxes.forEach(checkbox => {
                    checkbox.disabled = false;
                });

                if (checkboxesSeleccionados >= numSeleccionados) {
                    checkboxes.forEach(checkbox => {
                        if (!checkbox.checked) {
                            checkbox.disabled = true;
                        }
                    });
                }
            }

            numeroButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const selectedValue = this.getAttribute('data-value');
                    numeroInput.value = selectedValue;

                    numeroButtons.forEach(btn => {
                        btn.classList.remove('selected');
                    });
                    this.classList.add('selected');

                    checkboxes.forEach(checkbox => {
                        checkbox.checked = false;
                    });

                    updateSelectedCount();
                });
            });

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('click', function() {
                    updateSelectedCount();
                });
            });

            const selectedValue = numeroInput.value;
            if (selectedValue) {
                numeroButtons.forEach(button => {
                    if (button.getAttribute('data-value') === selectedValue) {
                        button.classList.add('selected');
                        updateSelectedCount();
                    }
                });
            }
        });
    </script>

    <script>
        const btnMostrarModal = document.getElementById("mostrar-semilleristas-modal");
const modal = document.getElementById("modal-semilleristas");
const btnCerrar = document.querySelector(".cerrarSemillerista");

// Mostrar el modal al hacer clic en el botón
btnMostrarModal.addEventListener("click", () => {
    modal.style.display = "block";
});

// Cerrar el modal al hacer clic en el botón de cerrar
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
    z-index: 1000; /* Asegura que el modal esté en la parte superior */
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
    width: 60%; /* Ajusta el ancho del modal según tu preferencia */
    max-height: 60%; /* Ajusta la altura máxima del modal según tu preferencia */
    overflow: auto;
}

/* Estilo para el botón */
/* Estilo para el botón */
#mostrar-semilleristas-modal {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

#mostrar-semilleristas-modal:disabled {
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
    overflow-y: auto; /* Agregar barra de desplazamiento vertical si el contenido excede la altura */
    max-height: 300px; /* Ajustar la altura máxima según tu preferencia */
}

th, td {
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
@endsection
