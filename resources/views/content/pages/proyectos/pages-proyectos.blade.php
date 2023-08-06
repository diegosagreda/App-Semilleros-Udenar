@extends('layouts/layoutMaster')

@section('title', 'Proyectos')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1@5.3.0-alpha1/dist/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.25.0/dist/js/bootstrap-icons.min.js"></script>
<link rel="stylesheet" href="{{ asset('proyecto/estilos/indexBotones.css') }}">
<link rel="stylesheet" href="{{ asset('proyecto/estilos/index.css') }}">

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/jquery-sticky/jquery-sticky.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
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
@if(session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
    @endif
<body>
    
    <div class="container">
        <div class="container">
            <div class="botones-container">
                <button type="button" class="btn btn-primary custom-btn" data-bs-toggle="modal" data-bs-target="#modalBusqueda">
                  Buscar Proyectos
                </button>
                <a href="{{ route('proyectos.index') }}" class="btn btn-primary custom-btn">Ver todos los proyectos</a>
              </div>
            <div class="modal fade" id="modalBusqueda" tabindex="-1" aria-labelledby="modalBusquedaLabel" aria-hidden="true">
                <div class="modal-dialog  modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalBusquedaLabel">Busqueda de proyectos:</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <option value="Innovacion y Desarrollo" >Innovacion y Desarrollo</option>
                                <option value="Emprendimiento">Emprendimiento</option>
                                <!-- Add more options as needed -->
                            </select>
                            <label for="tipoProyecto">Ultima búsqueda:</label>
                            <label for="tipoProyecto">
                                @if(request('tipoProyecto') === 'Investigacion')
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
                            <input type="date" name="fecha_inicioPro" id="fecha_inicioPro" class="form-control" >
                            <label for="fecha_inicioPro">Ultima fecha seleccionada:</label>
                            <label for="fecha_inicioPro">
                                @if(request('fecha_inicioPro'))
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
                                <option value="Propuesta" >Propuesta</option>
                                <option value="En curso" >En curso</option>
                                <option value="Finalizado">Finalizado</option>
                                <!-- Add more options as needed -->
                            </select>
                            <label for="estProyecto">Ultima búsqueda:</label>
                            <label for="estProyecto">
                                @if(request('estProyecto') === 'Propuesta')
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
            <button type="button" class="btn btn-primary close-btn" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" form="form_busqueda" class="boton custom-btn">
                <span class="bi bi-search fa-solid fa-magnifying-glass"></span> Buscar
            </button>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
        <header class="header">
            <h1>Proyectos</h1>
            <a class="btnA btn-outline-light" href="/proyectos/create">Agregar Proyecto</a>
        </header>
        <section class="projects-section">
            <div class="projects-grid">
                @if(count($proyectos) > 0)
					@php
					// Definimos un diccionario con los nombres de las imágenes asociados a cada tipo de proyecto (en minúsculas)
					$imagenesPorTipoProyecto = [
						'innovacion y desarrollo' => 'innovacion.png',
						'investigacion' => 'investigacion.png',
						'emprendimiento' => 'emprendimiento.png',
					];
					@endphp
                    @foreach($proyectos as $proyecto)
                        <div class="project-card">
                            <h3 class="project-title">{{$proyecto->nomProyecto}}</h3>
							@php
							// Convertimos el tipo de proyecto a minúsculas para que coincida con las claves del diccionario
							$tipoProyecto = strtolower($proyecto->tipoProyecto);
							
							// Verificamos si el tipo de proyecto existe en el diccionario antes de acceder a la imagen
							$imagen = $imagenesPorTipoProyecto[$tipoProyecto] ?? 'default.jpg'; // Usamos 'default.jpg' si no hay imagen para ese tipo de proyecto
							@endphp
							<img src="{{ asset('proyecto/' . $imagen) }}" alt="{{$proyecto->tipoProyecto}}" class="project-image">
							<p class="project-type">{{$proyecto->tipoProyecto}}</p>
                            <p class="project-status @if($proyecto->estProyecto === 'Propuesta') en-progreso @elseif($proyecto->estProyecto === 'En curso') terminado @else pendiente @endif">{{$proyecto->estProyecto}}</p>
                            <div class="project-actions">
                                <a href="{{ route('proyectos.show', $proyecto->codProyecto) }}" class="btn btn-primary">Ver detalles</a>
                                <form action="{{ url('proyectos/'.$proyecto->codProyecto)}}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    
                @else
                    <div class="no-projects-message show">
                        <img src="{{ asset('proyecto/giphy.gif') }}">
                        @if($tipo || $fecha || $estado)
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
  
.custom-btn {
    font-size: 1rem;
    text-align: center;
    background-color: transparent; /* Fondo transparente */
    border: 1px solid #007bff; /* Borde con color alrededor del botón */
    color: #007bff; /* Color del texto del botón */
  }
  
.custom-btn:hover {
    background-color: #007bff; /* Fondo del botón al pasar el mouse por encima */
    color: #fff; /* Color del texto al pasar el mouse por encima */
  }
  
.custom-btn:focus {
    background-color: #0056b3; /* Fondo del botón al hacer clic */
    border-color: #0056b3; /* Color del borde al hacer clic */
    color: #fff; /* Color del texto al hacer clic */
}


.close-btn {
    font-size: 1.5rem;
    color: #141111; /* Color del icono del botón */
    opacity: 0.5; /* Opacidad inicial del botón */
    background-color: transparent; /* Fondo transparente */
    border: none; /* Sin borde */
    outline: none; /* Sin contorno al hacer clic */
  }
  
  .close-btn:hover {
    opacity: 1; /* Opacidad al pasar el mouse por encima */
  }
  
  .close-btn:focus {
    opacity: 1; /* Opacidad al hacer clic */
  }
  
  /* Estilos personalizados para el botón "Buscar Proyectos" */

  .btnA {
    padding: 10px 20px;
    border: 2px solid #333;
    text-decoration: none;
    color: #333;
    font-size: 14px;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btnA:hover {
    background-color: #333;
    color: #fff;
}
</style>
@endsection
