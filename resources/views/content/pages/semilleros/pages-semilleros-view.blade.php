@extends('layouts/layoutMaster')



@section('content')
<h4 class="py-3 breadcrumb-wrapper mb-5">
  <span class="text-muted fw-light">Informacion /</span> Semillero
</h4>


<!-- Header -->
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
        <div class="flex-grow-1 mt-3 mt-sm-5">
          <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
            <div class="user-profile-info">
              <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                <li class="list-inline-item fw-semibold">
                  <i class='bx bx-flag'></i> Semillero
                </li>
                
                <li class="list-inline-item fw-semibold">
                  <i class='bx bx-calendar-alt'></i> Fecha vinculación
                </li>
              </ul>
            </div>
            <a href="{{ route('pages-semilleros')}}" class="btn btn-primary text-nowrap">
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
  <div class="col-md-6">
    <!-- About User -->
    <div class="card mb-4">
      <div class="card-body">
        
        <small class="text-muted text-uppercase">Informacion personal</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">Nombre completo:</span> </li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span class="fw-semibold mx-2">Teléfono:</span> </li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="fw-semibold mx-2">Correo:</span> </li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-map"></i><span class="fw-semibold mx-2">Dirección:</span> </li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">Género:</span> </li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-calendar-alt"></i><span class="fw-semibold mx-2">Fecha nacimiento:</span> </li>
     
        </ul>
        <small class="text-muted text-uppercase">Informacion academica</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span class="fw-semibold mx-2">Programa academico:</span> </li>
          <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span class="fw-semibold mx-2">Áreas conocimiento:</span>/li>
        </ul>
        <small class="text-muted text-uppercase">Adjuntos</small>
        <ul class="list-unstyled mt-3 mb-0">
          <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span> Acuerdo nombramiento</span></li>
        </ul>
      </div>
    </div>
    <!--/ About User -->
  </div>
</div>
<!--/ User Profile Content -->
@endsection
