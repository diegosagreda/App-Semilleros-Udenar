@extends('layouts/layoutMaster')

@section('title', 'Coordinadores')

<!-- Page -->
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-profile.css')}}" />
@endsection

@section('content')

<h4 class="py-3 breadcrumb-wrapper mb-4">
  <span class="text-muted fw-light">Gestión |</span> Coordinadores
</h4>
@if (count($semilleros) <= 0)
    <div class="alert alert-warning" role="alert">
        <p>
            En el momento no hay <strong>Semilleros</strong> registrados en el sistema.
        </p>
    </div>
@endif

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)"><strong>Coordinadores</strong></a>
    @if (count($semilleros) > 0)
      <a href="{{ route('coordinadores.create') }}" class="btn btn-primary text-nowrap">
        <i class="bx bx-user"></i> Nuevo
      </a>
    @endif

  </div>
</nav>


<!-- Cards coordinadores-->
<div class="row g-4">

  @forelse ($coordinadores as $coordinador)
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
        <!--Opciones editar e eliminar boton 3 puntos-->
        <div class="dropdown btn-pinned">
          <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item text-info" href="{{route('coordinadores.edit',$coordinador->identificacion)}}">Editar</a></li>
            <li>
              <form id="delete-form-{{ $coordinador->identificacion }}" method="POST" action="{{ route('coordinadores.destroy', $coordinador->identificacion) }}">
                @csrf
                @method('DELETE')
                <input type="submit" class="dropdown-item text-danger delete-button" value="Eliminar" data-id="{{ $coordinador->identificacion }}" />
              </form>
            </li>
          </ul>
        </div>
        <!-- Foto-->
        <div class="mx-auto mb-3">
          <img alt="Avatar Image" class="rounded-circle h-px-100 w-px-100" src="{{ asset('assets/img_coordinadores') . '/' . $coordinador->foto }}"
                    alt="Foto del coordinador">
        </div>
        <!--Nombre--->
        <h5 class="mb-1 card-title">{{$coordinador->nombre}}</h5>
        <!--Semillero--->

        <span style="color: rgb(123, 179, 39)"><i  style="margin-right: 5px;" class='bx bx-shield'></i><strong>{{$coordinador->semillero->nombre}}</strong></span>


        <div class="d-flex align-items-center justify-content-center mt-5">
          <a href="{{route('coordinadores.show',$coordinador->identificacion)}}" class="btn btn-primary d-flex align-items-center me-3"><i class="bx bx-user"></i>Ver perfil</a>
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

      const coordinadorId = event.target.getAttribute('data-id'); // Obtener el ID del coordinador
      const form = document.getElementById(`delete-form-${coordinadorId}`); // Obtener el formulario de eliminación

      Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        text: '¿Deseas eliminar al coordinador?',
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
            timer: 1500,
          });
        }
      });
    });
  });
</script>

@endsection
