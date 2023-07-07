@extends('layouts/layoutMaster')

@section('title', 'Semilleristas')

<!-- Page -->
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-profile.css')}}" />
@endsection

@section('content')
<h4 class="py-3 breadcrumb-wrapper mb-4">
  <span class="text-muted fw-light">Gestión |</span> Semilleristas
</h4>
@if (count($semilleros) <= 0)
    <div class="alert alert-warning" role="alert">
        <p>
            En el momento no hay <strong>Semilleros</strong> registrados en el sistema.
        </p>
    </div>
@endif

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Semilleristas</a>

    @if (count($semilleros) > 0)
    <a href="{{route('semilleristas.create')}}" class="btn btn-primary text-nowrap">
      <i class='bx bx-user'></i> Nuevo
    </a>
    @endif
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
              <form method="POST" action="{{route('semilleristas.destroy',$semillerista->identificacion)}}">
                @csrf
                @method('DELETE')
                <input type="submit" class="dropdown-item text-danger" value="Eliminar" />
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
            @csrf
            @method('PUT')
            <button style="background-color: transparent; border: none" type="submit" class="me-1"><span class="badge  {{$semillerista->estado === 'activo' ? 'bg-label-success' : 'bg-label-danger'}}">{{$semillerista->estado === 'activo' ? 'Activo' : 'Inactivo'}}</span></button>
          </form>
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
          <a href="{{route('semilleristas.show',$semillerista->identificacion)}}" class="btn btn-primary d-flex align-items-center me-3"><i class="bx bx-user"></i>Ver perfil</a>
        </div>
      </div>
    </div>
  </div>
  @empty

  @endforelse


</div>
<!--/ Semilleristas Cards -->
@endsection
