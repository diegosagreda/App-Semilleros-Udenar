@extends('layouts.layoutMaster')

@section('title', 'Perfil')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}">
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js') }}"></script>
@endsection
@section('content')
<div class="text-center py-3 breadcrumb-wrapper mb-5">
  <span class="text-muted fw-light">Informacion /</span> Semillero
</div>

<!-- Header -->
<div class="row justify-content-center">
  <div class="col-12">
    <div class="card mb-4">
      <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
          <img alt="Avatar Image" class="rounded-circle h-px-100 w-px-100" src="{{ asset('assets/img_semilleros') . '/' . $semillero->logo }}"
            alt="Foto del coordinador">
        </div>
        <div class="flex-grow-1 mt-3 mt-sm-5">
          <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
            <div class="user-profile-info">
              <h4>{{$semillero->nombre}}</h4>
              <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                <li class="list-inline-item fw-semibold">
                  <i class='bx bx-shield'></i> Id: <span style="color:rgb(9, 164, 9)">{{$semillero->id}}</span>
                </li>
                <li class="list-inline-item fw-semibold">
                  <i class='bx bx-calendar-alt'></i> Fecha creación: <span style="color:rgb(9, 164, 9)">{{$semillero->fecha_creacion}}</span>
                </li>
              </ul>
            </div>
            <a href="{{route('pages-semilleros')}}" class="btn btn-primary text-nowrap">
              <i class='bx bx-arrow-back'></i> Cerrar
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Header -->

<!-- User Profile Content -->
<div class="row justify-content-center contenido">
  <div class="col-md-16">
    <!-- About User -->
    <div class="card">
      <div class="card-body d-flex flex-wrap justify-content-around">
        <div>
          <small class="text-muted text-uppercase">Informacion de contacto</small>
          <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">Id:</span>
              <span>{{$semillero->id}}</span>
            </li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-pencil"></i><span class="fw-semibold mx-2">Nombre semillero:</span>
              <span>{{$semillero->nombre}}</span>
            </li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="fw-semibold mx-2">Correo:</span>
              <span>{{$semillero->correo}}</span>
            </li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-map"></i><span class="fw-semibold mx-2">Sede:</span>
              <span>{{$semillero->sede}}</span>
            </li>
          </ul>
          <small class="text-muted text-uppercase">Informacion academica</small>
          <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3"><i class="bx bx-book-open"></i><span class="fw-semibold mx-2">Presentación:</span>
              <span>{{$semillero->presentacion}}</span>
            </li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-book-open"></i><span class="fw-semibold mx-2">Descripción:</span>
              <span>{{$semillero->descripcion}}</span>
            </li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-book-bookmark"></i><span class="fw-semibold mx-2">Misión:</span>
              <span>{{$semillero->mision}}</span>
            </li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-bookmark-alt-minus"></i><span class="fw-semibold mx-2">Visión:</span>
              <span>{{$semillero->vision}}</span>
            </li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-task"></i><span class="fw-semibold mx-2">Objetivos:</span>
              <span>{{$semillero->objetivos}}</span>
            </li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-calendar-edit"></i><span class="fw-semibold mx-2">Valores:</span>
              <span>{{$semillero->valores}}</span>
            </li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-list-check"></i><span class="fw-semibold mx-2">Lineas de investigación:</span>
              <span>{{$semillero->lineas_investigacion}}</span>
            </li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-medal"></i><span class="fw-semibold mx-2">Numero de resolución: </span>
              <span>{{$semillero->numero_resolucion}}</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--/ About User -->
  <!-- Adjuntos -->
  <div class="card mt-4">
    <div class="card-body">
      <small class="text-muted text-uppercase">Adjuntos</small>
      <ul class="list-unstyled mt-3 mb-0">
        <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span> Acuerdo nombramiento</span></li>
      </ul>
      <div class="responsive-iframe-container">
        <iframe src="{{ asset('assets/docs_semilleros/' . $semillero->archivo_resolucion) }}" style="width:100%; min-height: 500px; border: 1px solid #ccc;"></iframe>
        </div> 
      
    </div>
  </div>
  <!--/ Adjuntos -->
</div>
</div>

<div class="col-md-12 texto">
  <h1>Semilleristas</h1>
</div>
<!-- Cards semilleristas-->
<div class="semilleristas">
  <div class="row g-4">
@forelse ($semillero->semilleristas as $semillerista)
<div class="col-xl-4 col-lg-6 col-md-6">
<div class="card">
<div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
  <!--Opciones editar e eliminar boton 3 puntos-->
  <!-- Foto-->
  <div class="mx-auto mb-3">
    <img alt="Avatar Image" class="rounded-circle h-px-100 w-px-100" src="{{ asset('assets/img_semilleristas') . '/' . $semillerista->foto}}"
              alt="Foto del coordinador">
  </div>
  <!--Nombre--->
  <h5 class="mb-1 card-title">{{$semillerista->nombre}}</h5>
  <!--Semillero--->

  <span style="color: rgb(123, 179, 39)"><i  style="margin-right: 5px;" class='bx bx-shield'></i><strong>{{$semillero->nombre}}</strong></span>


  <div class="d-flex align-items-center justify-content-center mt-5">
    <a href="{{route('semilleristas.show',$semillerista->identificacion)}}" class="btn btn-primary d-flex align-items-center me-3"><i class="bx bx-user"></i>Ver perfil</a>
  </div>
</div>
</div>
</div>
@empty

@endforelse
</div>
</div>

<!--/ Semilleristas Cards -->
<!--/ User Profile Content -->
@endsection

<style>
  .responsive-iframe-container {
    position: relative;
    overflow: hidden;
    padding-top: 56.25%;
  }
  .responsive-iframe-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 50%;
    height: 50%;
  }
  .semilleristas{
    text-align: left;
    padding: 1% 10%;
  }
  /* Ajusta los márgenes para el contenedor principal */
  .contenido {
    display: flex;
    text-align: left;
    padding: 1% 10%; /* Ajusta el espaciado superior e inferior según tus preferencias */
  }
  .card {
    margin: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  .texto{
    padding:1% 10%;
    text-align: center;
    justify-content: center;
  }

</style>



