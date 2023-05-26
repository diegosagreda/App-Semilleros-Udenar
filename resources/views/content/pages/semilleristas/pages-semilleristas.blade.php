@extends('layouts/layoutMaster')

@section('title', 'User Profile - Connections')

<!-- Page -->
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-profile.css')}}" />
@endsection

@section('content')
<h4 class="py-3 breadcrumb-wrapper mb-4">
  <span class="text-muted fw-light">Gestión |</span> Semilleristas
</h4>

<!-- Header -->
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="d-flex justify-content-md-between p-2 align-items-center">
        <div class="mt-2">
          <h4>Semilleristas</h4>
        </div>
        <a href="{{route('semilleristas.create')}}" class="btn btn-primary text-nowrap">
          <i class='bx bx-user'></i> Nuevo
        </a>
      </div>
    </div>
  </div>
</div>
<!--/ Header -->

<!-- Cards Semilleristas-->
<div class="row g-4">
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body text-center">
        <!--Opciones editar e eliminar boton 3 puntos-->
        <div class="dropdown btn-pinned">
          <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item text-info" href="javascript:void(0);">Editar</a></li>
            <li><a class="dropdown-item text-danger" href="javascript:void(0);">Eliminar</a></li>
          </ul>
        </div>
        <!-- Foto-->
        <div class="mx-auto mb-3">
          <img src="{{asset('assets/img/avatars/3.png')}}" alt="Avatar Image" class="rounded-circle w-px-100" />
        </div>
        <!--Nombre--->
        <h5 class="mb-1 card-title">Julian Lopéz</h5>
        <!--Semillero--->
        <span>Ingenieria de Sistemas</span>
        <div class="d-flex align-items-center justify-content-center my-3 gap-2">
          <a href="javascript:;" class="me-1"><span class="badge bg-label-success">Activo</span></a>
        </div>

        <div class="d-flex align-items-center justify-content-around my-4 py-2">
          <div>
            <h4 class="mb-1">2</h4>
            <span>Projectos</span>
          </div>
          <div>
            <h4 class="mb-1">3</h4>
            <span>Eventos</span>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
          <a href="javascript:;" class="btn btn-primary d-flex align-items-center me-3"><i class="bx bx-user"></i>Ver perfil</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body text-center">
        <!--Opciones editar e eliminar boton 3 puntos-->
        <div class="dropdown btn-pinned">
          <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item text-info" href="javascript:void(0);">Editar</a></li>
            <li><a class="dropdown-item text-danger" href="javascript:void(0);">Eliminar</a></li>
          </ul>
        </div>
        <!-- Foto-->
        <div class="mx-auto mb-3">
          <img src="{{asset('assets/img/avatars/12.png')}}" alt="Avatar Image" class="rounded-circle w-px-100" />
        </div>
        <!--Nombre--->
        <h5 class="mb-1 card-title">Fernanda Gomez</h5>
        <!--Semillero--->
        <span>Ingenieria Electronica</span>
        <div class="d-flex align-items-center justify-content-center my-3 gap-2">
          <a href="javascript:;" class="me-1"><span class="badge bg-label-danger">Inactivo</span></a>
        </div>

        <div class="d-flex align-items-center justify-content-around my-4 py-2">
          <div>
            <h4 class="mb-1">5</h4>
            <span>Projectos</span>
          </div>
          <div>
            <h4 class="mb-1">12</h4>
            <span>Eventos</span>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
          <a href="javascript:;" class="btn btn-primary d-flex align-items-center me-3"><i class="bx bx-user"></i>Ver perfil</a>
        </div>
      </div>
    </div>
  </div>

  
</div>
<!--/ Semilleristas Cards -->
@endsection
