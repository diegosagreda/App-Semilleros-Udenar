@extends('layouts/layoutMaster')

@section('title', 'Perfil')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
@endsection

<!-- Page -->
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-profile.css')}}" />
@endsection


@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-profile.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 breadcrumb-wrapper mb-5">
  <span class="text-muted fw-light">Informacion /</span> Coordinador
</h4>

<!-- Header -->
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">

          <img alt="Avatar Image" class="rounded-circle h-px-100 w-px-100" src="{{ asset('assets/profile') . '/' . $coordinador->foto }}"
          alt="Foto del coordinador">
        </div>
        <div class="flex-grow-1 mt-3 mt-sm-5">
          <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
            <div class="user-profile-info">
              <h4>{{$coordinador->nombre}}</h4>
              <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                <li class="list-inline-item fw-semibold">
                  <i class='bx bx-flag'></i> Semillero
                </li>

                <li class="list-inline-item fw-semibold">
                  <i class='bx bx-calendar-alt'></i> Fecha vinculación
                </li>
              </ul>
            </div>
            <a href="{{route('pages-coordinadores')}}" class="btn btn-primary text-nowrap">
              <i></i> Cerrar
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Header -->


<!-- User Profile Content -->
<div class="row justify-content-center">
  <div class="col-md-12">
    <!-- About User -->
    <div class="card ">
      <div class="card-body d-flex  flex-wrap justify-content-around gap-4">
        <div>
          <small class="text-muted text-uppercase">Informacion personal</small>
          <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">Nombre completo:</span> <span>{{$coordinador->nombre}}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span class="fw-semibold mx-2">Teléfono:</span> <span>{{$coordinador->telefono}}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="fw-semibold mx-2">Correo:</span> <span>{{$coordinador->correo}}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-map"></i><span class="fw-semibold mx-2">Dirección:</span> <span>{{$coordinador->direccion}}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">Género:</span> <span>{{$coordinador->genero}}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-calendar-alt"></i><span class="fw-semibold mx-2">Fecha nacimiento:</span> <span>{{$coordinador->fecha_nacimiento}}</span></li>

          </ul>
          <small class="text-muted text-uppercase">Informacion academica</small>
          <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span class="fw-semibold mx-2">Programa academico:</span> <span>{{$coordinador->programa_academico}}</span></li>
            <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span class="fw-semibold mx-2">Áreas conocimiento:</span> <span>{{$coordinador->areas_conocimiento}}</span></li>
          </ul>
        </div>
        <div>
          <small class="text-muted text-uppercase">Adjuntos</small>
          <ul class="list-unstyled mt-3 mb-0">
            <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span> Acuerdo nombramiento</span></li>
          </ul>

          <iframe src="{{ asset('assets/docs_coordinadores/' . $coordinador->acuerdo_nombramiento) }}" style="width:500px; height:500px;" frameborder="0"></iframe>

        </div>

      </div>
    </div>
    <!--/ About User -->
  </div>
</div>
<!--/ User Profile Content -->

@endsection
