@extends('layouts/layoutMaster')

@section('title', 'Semilleros')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-profile.css')}}" />
@endsection

@section('content')
<h4 class="py-3 breadcrumb-wrapper mb-4">
  <span class="text-muted fw-light">Gestión |</span> Semilleros
</h4>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Semilleros</a>

    <div class="ml-auto align-items-center"> <!-- Agregar esta división para alinear a la derecha -->
      <a href="{{ route('semilleros.pdf') }}" id="reporte" name="reporte" class="btn btn-danger text-nowrap verPro reportes">
        <i class='fas fa-file-pdf'></i> Reporte
      </a>
      <a href="{{route('semilleros.create')}}" class="btn btn-primary text-nowrap verPro">
        <i class='bx bx-user'></i> Nuevo
      </a>
    </div>
  </div>
</nav>

<!-- Bordered Table -->
<div class="card">
  <h5 class="card-header">Lista de semilleros</h5>
  <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Logo</th>
            <th>Nombre</th>
            <th>Coordinador</th>
            <th>Semilleristas</th>
            <th>Correo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @forelse ($semilleros as $semillero)
          <tr>
            <td style="text-align: center;">
              <img src="{{ asset('assets/img_semilleros/' . $semillero->logo ) }}" alt="Avatar" class="rounded-circle" style="width: 100px; height: 100px; display: block; margin: 0 auto;">
          </td>
            <td><strong>{{ $semillero->nombre }}</strong></td>
            <td>
              @if ($semillero->coordinador)
        <a href="{{ route('coordinadores.show', $semillero->coordinador->identificacion) }}" class="d-flex align-items-center me-3">
            {{ $semillero->coordinador->nombre }}
        </a>
        @else
          Sin asignar
        @endif
              </td>
              <td>
                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                    @if(count($semillero->semilleristas) > 0)
                        @foreach ($semillero->semilleristas as $semillerista)
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="{{ $semillerista->nombre }}">
                                <a href="{{ route('semilleristas.show', $semillerista->identificacion) }}" class="d-flex align-items-center me-6">
                                    <img src="{{ asset('assets/img_semilleristas/' . $semillerista->foto) }}" alt="Avatar" class="rounded-circle" style="width: 40px; height: 40px;">
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li>Sin asignar</li>
                    @endif
                </ul>
            </td>
            <td><span class="badge bg-label-primary me-1">{{ strtolower($semillero->correo) }}</span></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"></button>
                <div class="dropdown @if(count($semilleros) < 3) show-all-options @endif">
                  <a class="dropdown-item" href="{{route('semilleros.view',$semillero->id)}}"><i class="bx bx-search-alt me-1"></i> Ver</a>
                  <a class="dropdown-item" href="{{route('semilleros.edit',$semillero->id)}}"><i class="bx bx-edit-alt me-1"></i> Editar</a>
                  
                  <form id="delete-form-{{ $semillero->id  }}" method="POST" action="{{ route('semilleros.destroy', $semillero->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item delete-button"  me-1 data-id="{{ $semillero->id }}"><i class="bx bx-trash me-1"></i> Eliminar</button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
          @empty
                <p>No hay registros</p>
            @endforelse

        </tbody>
      </table>
    </div>
  </div>
</div>
<style>

  .reportes{
    margin-right: 10px;
  }

</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
<script>
  document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', function (event) {
      event.preventDefault();
  
      const semilleroId = event.target.getAttribute('data-id');
      const form = document.getElementById(`delete-form-${semilleroId}`);
  
      Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        text: '¿Deseas eliminar el semillero?',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
      }).then((result) => {
        if (result.isConfirmed) {
          // Si el usuario confirma, enviar el formulario
          form.submit();
        } else {
          // Si el usuario cancela, no sucede nada
          Swal.fire({
            icon: 'info',
            title: 'Cancelado',
            text: 'La eliminación ha sido cancelada',
            showConfirmButton: false,
            timer: 1500,
          });
        }
      });
    });
  });
</script>
@endsection


