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
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Coordinadores</a>

    <a href="{{route('coordinadores.create')}}" class="btn btn-primary text-nowrap">
      <i class='bx bx-user'></i> Nuevo
    </a>
  </div>
</nav>


<!-- Cards coordinadores-->
<div class="row g-4">
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
        <!--Opciones editar e eliminar boton 3 puntos-->
        <div class="dropdown btn-pinned">
          <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item text-info" href="#">Editar</a></li>
            <li>
              <form>
                @csrf
                @method('DELETE')
                <input class="dropdown-item text-danger" value="Eliminar" />
              </form>
            </li>
          </ul>
        </div>
        <!-- Foto-->
        <div class="mx-auto mb-3">
          <img alt="Avatar Image" class="rounded-circle h-px-100 w-px-100" src="{{ asset('assets/img/avatars/1.png') }}"
                    alt="Foto del coordinador">
        </div>
        <!--Nombre--->
        <h5 class="mb-1 card-title">Julian Ramirez</h5>
        <!--Semillero--->
        <span>Semillero Grias</span>

        <div class="d-flex align-items-center justify-content-center mt-5">
          <a href="#" class="btn btn-primary d-flex align-items-center me-3"><i class="bx bx-user"></i>Ver perfil</a>
        </div>

      </div>
    </div>
  </div>
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
              <form method="POST" action="{{route('coordinadores.destroy',$coordinador->identificacion)}}">
                @csrf
                @method('DELETE')
                <input type="submit" class="dropdown-item text-danger" value="Eliminar" />
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
        <span>Semillero asignado</span>

        <div class="d-flex align-items-center justify-content-center mt-5">
          <a href="{{route('coordinadores.show',$coordinador->identificacion)}}" class="btn btn-primary d-flex align-items-center me-3"><i class="bx bx-user"></i>Ver perfil</a>
        </div>
      </div>
    </div>
  </div>
  @empty
  <div class="alert alert-warning" role="alert">
    <p>
      En el momento no hay coordinadores registrados
    </p>
  </div>
  @endforelse
</div>
<!--/ Semilleristas Cards -->
@endsection
