@extends('layouts/layoutMaster')

@section('title', 'Evento show')

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
  <span class="text-muted fw-light">Informacion /</span> Eventos
</h4>


<!-- Header -->
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
          
          <img alt="Event Image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" src="{{ asset('assets/eventos') . '/' . $evento->foto }}"
          alt="Foto del evento">
        </div>
        <div class="flex-grow-1 mt-3 mt-sm-5">
          <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
            <div class="user-profile-info">
              <h4>{{$evento->nombre}}</h4>
              <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                <li class="list-inline-item fw-semibold">
                  <i class='bx bx-calendar-alt'></i> Fecha:   <span>{{$evento->fecha_inicio}}</span></li>
                </li>
                <li class="list-inline-item fw-semibold">
                  <i class='bx bx-flag'></i> Lugar:  <span>{{$evento->lugar}}</span></li>
                </li>
              </ul>
            </div>
            <a href="{{route('eventos.index')}}" class="btn btn-primary text-nowrap">
              <i></i> Cerrar
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Header -->


<!-- Event Profile Content -->
<div class="row justify-content-center">
  <div class="col-md-6">
    <!-- Event Details -->
    <div class="card mb-4">
      <div class="card-body">
        
        <small class="text-muted text-uppercase">Detalles del evento</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="bx bx-calendar-alt"></i><span class="fw-semibold mx-2">Fecha inicio:</span> <span>{{$evento->fecha_inicio}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-calendar-alt"></i><span class="fw-semibold mx-2">Fecha fin:</span> <span>{{$evento->fecha_fin}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-book"></i><span class="fw-semibold mx-2">Lugar:</span> <span>{{$evento->lugar}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-book"></i><span class="fw-semibold mx-2">Nombre Evento:</span> <span>{{$evento->nombre}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-book"></i><span class="fw-semibold mx-2">Descripción:</span> <span>{{$evento->descripcion}}</span></li>
        </ul>

        <small class="text-muted text-uppercase">Detalles adicionales</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="bx bx-group"></i><span class="fw-semibold mx-2">Tipo de evento:</span> <span>{{$evento->tipo}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-group"></i><span class="fw-semibold mx-2">Modalidad:</span> <span>{{$evento->modalidad}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-group"></i><span class="fw-semibold mx-2">Clasificación:</span> <span>{{$evento->clasificacion}}</span></li>
        </ul>
        
        <small class="text-muted text-uppercase">Observaciones</small>
        <ul class="list-unstyled mt-3 mb-0">
          <li class="d-flex align-items-center mb-3"><i class="bx bx-file"></i><span>{{$evento->observaciones}}</span></li>
        </ul>
      </div>
    </div>
    <!--/ Event Details -->
  </div>
</div>
<!--/ Event Profile Content -->
@endsection
