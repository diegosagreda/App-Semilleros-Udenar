@extends('layouts/layoutMaster')

@section('title', 'Sticky Actions - Forms')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/jquery-sticky/jquery-sticky.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
@endsection



@section('content')

<!-- Sticky Actions -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
          <h5 class="card-title mb-sm-0 me-2">Registrar Evento</h5>
          <div class="action-btns">
            <a href="{{ route('pages-eventos')}}" class="btn btn-danger">
              <span class="align-middle">Cancelar</span>
            </a>
            <button type="submit" class="btn btn-primary">
              Guardar
            </button>
          </div>
        </div>
        <br>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <fieldset class="border p-4 mb-5">
                <legend class="w-auto">Información Evento</legend>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label" for="codigo">Codigo</label>
                      <input type="text" id="codigo" name="codigo" class="form-control" />
                    </div> 
                    <div class="col-md-6">
                      <label class="form-label" for="nombre">Nombre Evento</label>
                      <input type="text" id="nombre" name="nombre" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="descripcion">Descripcion</label>
                      <div class="input-group input-group-merge">
                        <textarea name="descripcion" class="form-control" id="descripcion" rows="1"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="tipo">Tipo Evento</label>
                      <select id="tipo" name="tipo" class="select2 form-select" data-allow-clear="true">
                        <option value="">Selecciona Tipo evento</option>
                        <option value="congreso">Congreso</option>
                        <option value="encuentro">Encuentro</option>
                        <option value="seminario">Seminario</option>
                        <option value="taller">Taller</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="modalidad">Modalidad</label>
                      <select id="modalidad" name="modalidad" class="select2 form-select" data-allow-clear="true">
                        <option value="">Selecciona Modalidad</option>
                        <option value="virtual">Virtual</option>
                        <option value="presencial">Presencial</option>
                        <option value="hibrida">Híbrida</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="clasificacion">Clasificación</label>
                      <select id="clasificacion" name="clasificacion" class="select2 form-select" data-allow-clear="true">
                        <option value="">Selecciona Clasificación</option>
                        <option value="local">Local</option>
                        <option value="regional">Regional</option>
                        <option value="nacional">Nacional</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <label class="form-label" for="direccion">Lugar Evento</label>
                      <textarea name="lugar" class="form-control" id="lugar" rows="1"></textarea>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="fecha_inicio">Fecha Inicio del evento</label>
                      <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" />
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="fecha_fin">Fecha Fin del Evento</label>
                      <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" />
                    </div>
                  </div>
                  <br>
                  <div class="col-12">
                    <label class="form-label" for="foto">Foto del Evento</label>
                    <input type="file" id="foto" name="foto" class="form-control" />
                  </div>
                </div>

              
<!-- /Sticky Actions -->
@endsection
