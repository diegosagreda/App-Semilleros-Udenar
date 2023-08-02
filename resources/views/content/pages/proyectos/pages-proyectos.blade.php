@extends('layouts/layoutMaster')

@section('title', 'Proyectos')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/jquery-sticky/jquery-sticky.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
@endsection



@section('content')
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyectos</title>
    <meta name="description" content="Various styles and inspiration for responsive, flexbox-based HTML pricing tables" />
    <meta name="keywords" content="pricing table, inspiration, ui, modern, responsive, flexbox, html, component" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Homemade+Apple' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Sahitya:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
    
    <!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif
<body>
    <div class="container">
        <header class="header">
            <h1>Proyectos</h1>
            <a class="btn btn-outline-light" href="/proyectos/create">Agregar Proyecto</a>
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
						<img src="proyecto/giphy.gif" alt="No hay proyectos registrados">
                        <p>No hay proyectos registrados</p>
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
</body>

</html>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.header h1 {
    font-size: 24px;
    margin: 0;
    color: #333;
}

.no-projects-message {
  text-align: center; /* Centrar el texto en el contenedor */
  opacity: 0;
  transform: translateY(-20px); /* Desplazar el texto hacia arriba */
  transition: opacity 0.5s ease, transform 0.5s ease;
}

.no-projects-message.show {
  opacity: 1;
  transform: translateY(0); /* Volver a la posición original */
}

.btn {
    padding: 10px 20px;
    border: 2px solid #333;
    text-decoration: none;
    color: #333;
    font-size: 14px;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn:hover {
    background-color: #333;
    color: #fff;
}

.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.project-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
}

.project-card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.project-title {
    font-size: 24px;
    margin: 0;
    color: #333;
    font-weight: bold;
	margin-bottom: 20px;
}

.project-image {
  max-width: 200px; /* Ajusta el tamaño según lo desees */
  height: auto;
  border: 2px solid #ddd; /* Borde con color gris claro */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra suave */
  transition: all 0.3s ease; /* Transición suave para animaciones */
  opacity: 0.8; /* Opacidad inicial de la imagen */
  transition: opacity 0.3s ease, transform 0.3s ease; /* Transiciones para opacity y transform */
}

.project-image:hover {
  transform: scale(1.05); /* Efecto de aumento de tamaño al pasar el cursor */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra más pronunciada al pasar el cursor */
  opacity: 1; /* Opacidad completa al pasar el cursor */
  transform: translateY(-5px); /* Desplazamiento hacia arriba al pasar el cursor */
}

.project-card {
  /* Ajusta el tamaño y el espacio entre tarjetas según tus preferencias */
  width: 350px;
  margin: 10px;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  text-align: center; /* Centra el contenido en el contenedor */
  background-color: #f9f9f9;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.project-image {
  max-width: 150px; /* Ajusta el tamaño de la imagen según lo desees */
  height: auto;
  border: 2px solid #ddd;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.project-card:hover {
  transform: scale(1.05);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.project-card .project-title {
	font-size: 1.2rem; /* Tamaño del título ajustado según tus preferencias */
  	font-weight: bold; /* Texto en negrita para resaltar el título */
 	 margin-top: 15px; /* Espacio entre el título y la imagen */
}

.project-card .project-type {
  font-style: italic;
  color: #666;
  margin: 5px 0; /* Espacio entre el tipo de proyecto y la imagen */
}

.project-card .project-status {
  font-weight: bold;
  margin-bottom: 15px; /* Espacio entre el estado del proyecto y la imagen */
}

.project-card .project-actions {
  display: flex;
  justify-content: center; /* Centra los botones */
}

.project-card .btn {
  margin: 5px;
}

/* Asegúrate de que las imágenes estén centradas verticalmente */
.project-card .project-image {
  display: block;
  margin: 0 auto;
}

.project-card .project-actions {
  display: flex;
  justify-content: center;
  margin-top: 15px; /* Espacio entre los botones y el resto del contenido */
}

.project-card .btn {
  padding: 8px 15px;
  margin: 0 5px;
  border: none;
  border-radius: 5px;
  font-size: 14px;
  cursor: pointer;
  background-color: #fff; /* Fondo blanco por defecto */
  color: #007bff; /* Texto en color azul por defecto */
  transition: background-color 0.3s ease; /* Transición suave para el cambio de color de fondo */
}

.project-card .btn:hover {
  background-color: #007bff; /* Color de fondo al pasar el cursor por el botón */
  color: #fff; /* Texto en color blanco al pasar el cursor por el botón */
}


.project-type {
    font-size: 18px;
    margin: 5px 0;
    color: #666;
}

.project-status {
    font-size: 18px;
    margin: 5px 0;
    padding: 5px 10px;
    border-radius: 5px;
}

.en-progreso {
    background-color: #28a745;
    
    color: #fff;
}

.terminado {
    background-color: #ffcd56;
    color: #fff;
}

.pendiente {
    background-color: #dc3545;
    color: #fff;
}

.project-actions {
    margin-top: 20px;
    display: flex;
}

.project-actions .btn {
    margin-right: 10px;
}

.delete-form {
    display: inline;
}

.no-projects-message {
    text-align: center;
    font-size: 24px;
    color: #555;
    margin: 50px 0;
}

.footer {
    text-align: center;
    padding: 20px 0;
    font-size: 12px;
    color: #999;
}


</style>


@endsection