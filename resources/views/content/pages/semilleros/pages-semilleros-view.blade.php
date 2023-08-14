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
<h4 class="py-3 breadcrumb-wrapper mb-5">
  <span class="text-muted fw-light">Informacion /</span> Semillero
</h4>

<!-- Header -->
<div class="row">
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
  <div class="col-md-12">
    <!-- About User -->
    <div class="card">
      <div class="card-body d-flex flex-wrap justify-content-around gap-4">
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
  <div class="card mt-4 adjunto">
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
    width: 100%;
    height: 100%;
  }
  .contenido{
    width: fit-content;
    text-align: left;
    padding: 1%
  }
  .card {
    margin: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

</style>



