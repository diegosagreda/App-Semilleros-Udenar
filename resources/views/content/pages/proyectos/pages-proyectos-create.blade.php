@extends('layouts/layoutMaster')

@section('title', 'Crear Proyecto')

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
      <form action="{{ route('proyectos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
          <h5 class="card-title mb-sm-0 me-2">Registro de Proyecto</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <fieldset class="border p-4 mb-5">
                <legend class="w-auto">Información del Proyecto</legend>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="codProyecto">Código</label>
                    <input type="text" id="codProyecto" name="codProyecto" class="form-control"  required/>
                  </div> 
                  <div class="col-md-6">
                    <label class="form-label" for="nomProyecto">Título del Proyecto</label>
                    <input type="text" id="nomProyecto" name="nomProyecto" class="form-control" required/>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="tipoProyecto">Tipo</label>
                    <select id="tipoProyecto" name="tipoProyecto" class="form-control" required>
                      <option value="">Seleccionar tipo</option>
                      <option value="Investigacion">Investigación</option>
                      <option value="Innovacion y Desarrollo">Innovación y Desarrollo</option>
                      <option value="Enpredimiento">Emprendimiento</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="estProyecto">Estado</label>
                    <select id="estProyecto" name="estProyecto" class="form-control" required>
                      <option value="">Seleccionar estado</option>
                      <option value="En curso">En curso</option>
                      <option value="Finalizado">Finalizado</option>
                      <option value="Inactivo">Inactivo</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="fecha_inicioPro">Fecha de Inicio</label>
                    <input type="date" id="fecha_inicioPro" name="fecha_inicioPro" class="form-control" required/>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="fecha_finPro">Fecha de Finalización</label>
                    <input type="date" id="fecha_finPro" name="fecha_finPro" class="form-control" required/>
                  </div> 
                  <div class="col-md-6">
                    <label class="form-label" for="PropProyecto">Propuesta</label>
                    <input type="file" id="PropProyecto" name="PropProyecto" class="form-control" required/>
                  </div> 
                  <div class="col-md-6">
                    <label class="form-label" for="Proyecto_final">Proyecto Final</label>
                    <input type="file" id="Proyecto_final" name="Proyecto_final" class="form-control" required/>
                  </div> 
                </div>
                
              </fieldset>
              <div class="col-md-6">
                <label class="form-label" for="semillero_id">ID del Semillero</label>
                <select id="semillero_id" name="semillero_id" class="form-control" required>
                  <option value="">Seleccionar semillero</option>
          
                  <option value="1">Semillero 1</option>
                  <option value="2">Semillero 2</option>
                  <option value="3">Semillero 3</option>
                
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <a href="/proyectos" class="btn btn-danger">
            <span class="align-middle">Cancelar</span>
          </a>
          <button type="submit" class="btn btn-primary">
            Guardar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- /Sticky Actions -->
@endsection

