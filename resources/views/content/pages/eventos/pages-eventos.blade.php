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
                <a href="{{ route('eventos.edit', ['evento' => $evento->codigo]) }}" class="dropdown-item text-info">Editar</a>
                <li>
                  <form method="POST" action="{{ route('eventos.destroy', $evento->codigo) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="dropdown-item text-danger" value="Eliminar" />
                  </form>
                </li>
              </ul>
            </div>
            <!-- Foto -->
            <div class="mx-auto mb-3">
              <img alt="Foto del evento"
     class="h-px-100 w-px-111 rounded h-px-0 w-px-111 img-fluid"
     src="{{ asset(Storage::disk('public')->url('img_eventos/' . $evento->foto)) }}"
     alt="Foto del evento">


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
        <p>En este momento no hay eventos registrados.</p>
      </div>
      @endforelse
    </div>
    <!--/ Cards Eventos -->
    @endsection


