@extends('layouts/layoutMaster')

@section('title', 'Semilleristas')

<!-- Page -->
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-profile.css')}}" />
@endsection

@section('content')
<h4 class="py-3 breadcrumb-wrapper mb-4">
  <span class="text-muted fw-light">Gestión |</span> Semilleristas
  @role('coordinador')
   - {{$semillero->nombre}}
  @endrole
</h4>
@role('admin')
  @if (count($semilleros) <= 0)
      <div class="alert alert-warning" role="alert">
          <p>
              En el momento no hay <strong>Semilleros</strong> registrados en el sistema.
          </p>
      </div>
  @endif
@endrole

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Semilleristas</a>
    @role('admin')
    <div class="col-md-4">
      <select id="semillero-filter" name="semillero" class="select2 form-select" data-allow-clear="true">
        <option value="">Selecciona semillero</option>
        <option value="0">Mostrar todos</option>
        @foreach ($semilleros as $semillero)
        <option value="{{$semillero->id}}">{{$semillero->nombre}}</option>
        @endforeach
      </select>
    </div>
    @endrole
    @if (count($semilleros) > 0)
    <a href="{{route('semilleristas.create')}}" class="btn btn-primary text-nowrap">
      <i class='bx bx-user'></i> Nuevo
    </a>
    @endif
    @role('coordinador')
    <a href="{{route('semilleristas.create')}}" class="btn btn-primary text-nowrap">
      <i class='bx bx-user'></i> Nuevo
    </a>
    @endrole

  </div>
</nav>
<!--/ Header -->

<!-- Cards Semilleristas-->
<div class="row g-4">

  @forelse ($semilleristas as $semillerista)
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body text-center">
        <!--Opciones editar e eliminar boton 3 puntos-->
        <div class="dropdown btn-pinned">
          <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item text-info" href="{{route('semilleristas.edit',$semillerista->identificacion)}}">Editar</a></li>
            <li>
              <form id="delete-form-{{ $semillerista->identificacion }}" method="POST" action="{{ route('semilleristas.destroy', $semillerista->identificacion) }}">
                @csrf
                @method('DELETE')
                <input type="submit" class="dropdown-item text-danger delete-button" value="Eliminar" data-id="{{ $semillerista->identificacion }}" />
              </form>
            </li>
          </ul>
        </div>
        <!-- Foto-->
        <div class="mx-auto mb-3">
          <img src="{{ asset('assets/img_semilleristas') . '/' . $semillerista->foto }}" alt="Avatar Image" class="rounded-circle h-px-100 w-px-100" />
        </div>
        <!--Nombre--->
        <h5 class="mb-1 card-title">{{$semillerista->nombre}}</h5>
        <!--Semillero--->
        <span>{{$semillerista->programa_academico}}</span>
        <br>

        <span style="color: rgb(123, 179, 39)"><i  style="margin-right: 5px;" class='bx bx-shield'></i><strong>{{$semillerista->semillero->nombre}}</strong></span>

        <div class="d-flex align-items-center justify-content-center my-3 gap-2">
          <form method="POST" action="{{route('semilleristas.updateState', $semillerista->identificacion)}}">
            @method('PUT')
            @csrf
            <button id="cambiar-estado" style="background-color: transparent; border: none" type="submit" class="me-1"><span class="badge  {{$semillerista->estado === 'activo' ? 'bg-label-success' : 'bg-label-danger'}}">{{$semillerista->estado === 'activo' ? 'Activo' : 'Inactivo'}}</span></button>
          </form>
        </div>

        <div class="d-flex align-items-center justify-content-around my-4 py-2">
          <div class="proyectos">
            @php
              $eventos = 0;
              foreach ($semillerista->proyectos as $proyecto) {
                  $eventos += count($proyecto->eventos);
              }
            @endphp

            <h4 class="mb-1">{{ count( $semillerista->proyectos)}}</h4>
            <span>Projectos</span>
          </div>
          <div>
            <h4 class="mb-1">{{ $eventos}}</h4>
            <span>Eventos</span>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
          <a href="{{route('semilleristas.show',$semillerista->identificacion)}}" class="btn btn-primary d-flex align-items-center me-3"><i class="bx bx-user"></i>Ver perfil</a>
        </div>
      </div>
    </div>
  </div>
  @empty

  @endforelse
</div>
<!--/ Semilleristas Cards -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

<script>

  document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', function (event) {
      event.preventDefault(); // Prevenir el envío del formulario por defecto

      const semilleristaId = event.target.getAttribute('data-id'); // Obtener el ID del semillerista
      const form = document.getElementById(`delete-form-${semilleristaId}`); // Obtener el formulario de eliminación

      Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        text: '¿Deseas eliminar al semillerista?',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
      }).then((result) => {
        if (result.isConfirmed) {
          // Si el usuario confirma, enviar el formulario
          form.submit();
        } else {
          // Si el usuario cancela, no sucede nada
          // Puedes agregar un mensaje adicional si lo deseas
          Swal.fire({
            icon: 'info',
            title: 'Cancelado',
            text: 'La eliminación ha sido cancelada',
            showConfirmButton: false, // Ocultar el botón de confirmación
            timer: 1500
          });
        }
      });
    });
  });

  // Manejar el evento de cambio de selección del menú desplegable
 /*document.getElementById('semillero-filter').addEventListener('change', function() {
  let semilleroId = this.value;
  const url = "{{ route('semilleristas.filtro', ':semilleroId') }}".replace(':semilleroId', semilleroId);
  if(semilleroId !== '0'){
    window.location.href = url;

  }else{
    window.location.href = "{{route('pages-semilleristas')}}"
});*/


</script>
@endsection

<style>
  .proyectos:hover{
    cursor: pointer;
  }
</style>
