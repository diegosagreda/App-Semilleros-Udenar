@extends('layouts/layoutMaster')

@section('title', 'Eventos')

<!-- Page -->
@section('page-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}" />
@endsection

@section('content')

   <h4 class="py-3 breadcrumb-wrapper mb-4">
  <span class="text-muted fw-light">Gestión |</span> Eventos
</h4>
<form action="{{ route('eventos.index') }}" method="GET" class="mb-4">
  <div class="input-group">
      <input type="text" name="search" class="form-control" placeholder="Buscar eventos..." value="{{ request('search') }}">
      <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
</form>

<!-- Header -->
<div class="d-flex justify-content-between">
  @role('admin')
  <a href="{{route('eventos.create')}}" class="btn btn-primary text-nowrap">
    <i class='bx bx-calendar text-info display-6'></i> Crear Evento
  </a>
  @endrole
  @role('coordinador')
  <a href="{{route('eventos.create')}}" class="btn btn-primary text-nowrap">
    <i class='bx bx-calendar text-info display-6'></i> Crear Evento
  </a>
  @endrole
</div>
<!--/ Header -->

<br>

    <!-- Cards Eventos -->
    <div class="row g-4">
      @forelse ($eventos as $evento)
      <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card">
          <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
            <!-- Opciones editar y eliminar -->
            <div class="dropdown btn-pinned">
              <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item text-info" href="{{ route('eventos.edit', ['evento' => $evento->codigo]) }}">Editar</a>
                  <li>
                      <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $evento->codigo }}">
                          Eliminar
                      </button>
                  </li>
              </ul>
          </div>
          
          <!-- confirmación de eliminación -->
          <div class="modal fade" id="confirmDeleteModal{{ $evento->codigo }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="confirmDeleteModalLabel">Confirme la Eliminación</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        ¿Desea eliminar el Evento "<strong style="font-size: 1.2em;">{{ $evento->nombre }}</strong>"?

                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                          <form method="POST" action="{{ route('eventos.destroy', $evento->codigo) }}" class="delete-form">
                              @csrf
                              @method('DELETE')
                              <input type="submit" class="btn btn-danger" value="Eliminar" />
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          
            <!-- Foto -->
            <div class="mx-auto mb-3">
              <img alt="Foto del evento" class=" h-px-100 w-px-111; rounded h-px-0 w-px-111 img-fluid" src="{{ asset('assets/eventos/' . $evento->foto) }}" alt="Foto del evento">
            </div>
            <!-- Nombre del evento -->
            <h5 class="mb-1 card-title" style="color: rgb(0, 0, 0); font-size: 30px;">{{ $evento->nombre }}</h5>
            <!-- Descripción del evento -->
            <br>
            <div class="div1">

              <span class="icon bx bx-book " style="color: rgb(234, 88, 25);"></span><h5 >{{ $evento->descripcion }}</h5>


          </div>
            <!-- Tipo de evento -->
            <span  class="bx bx-group" style="color: rgb(0, 192, 42)" style=" font-weight: bold; "></span><span> {{ $evento->tipo }}</span>

            <div class="d-flex align-items-center justify-content-center mt-5">
              <a href="{{ route('eventos.show', $evento->codigo) }}" class="btn btn-primary d-flex align-items-center me-3">
                 Ver detalles
              </a>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="alert alert-warning" role="alert">
        <p>En este momento no hay Eventos registrados.</p>
      </div>
      
      @endforelse
    </div>

    {{-- <script>
      document.addEventListener('DOMContentLoaded', function () {
          const deleteForms = document.querySelectorAll('.delete-form');
          
          deleteForms.forEach(form => {
              form.addEventListener('submit', function (event) {
                  if (!confirm('¿Estás seguro de que deseas eliminar este evento?')) {
                      event.preventDefault();
                  }
              });
          });
      });
  </script> --}}
    <!--/ Cards Eventos -->
    @endsection


