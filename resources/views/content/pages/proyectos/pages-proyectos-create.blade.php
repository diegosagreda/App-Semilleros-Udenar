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
@if ($errors->any())
    <div class="error-container">
        <h4 class="error-heading">¡Oops! Se encontraron errores:</h4>
        <ul class="error-list">
            @foreach ($errors->all() as $item)
                <li class="error-item">{{ $item }}</li>
            @endforeach
        </ul>
    </div>
@endif




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
                    <input type="text" id="codProyecto" name="codProyecto" class="form-control" 
                     value="{{ isset($proyecto) ? old('codProyecto', $proyecto->codProyecto) : old('codProyecto') }}"/>
                  </div> 
                  <div class="col-md-6">
                    <label class="form-label" for="nomProyecto">Título del Proyecto</label>
                    <input type="text" id="nomProyecto" name="nomProyecto" class="form-control" 
                    value="{{ isset($proyecto) ? old('nomProyecto', $proyecto->nomProyecto) : old('nomProyecto') }}"/>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="tipoProyecto">Tipo</label>
                    <select id="tipoProyecto" name="tipoProyecto" class="form-control" >
                      <option value="">Seleccionar tipo</option>
                      <option value="Investigacion" 
                      {{ isset($proyecto) ? ($proyecto->tipoProyecto == 'Investigacion' ? 'selected' : '')
                       : 
                      (old('tipoProyecto') == 'Investigacion' ? 'selected' : '') }}>Investigación</option>
                      <option value="Innovacion y Desarrollo"
                      {{ isset($proyecto) ? ($proyecto->tipoProyecto == 'Innovacion y Desarrollo' ? 'selected' : '')
                       : 
                      (old('tipoProyecto') == 'Innovacion y Desarrollo' ? 'selected' : '') }}>Innovación y Desarrollo</option>
                      <option value="Enpredimiento"
                      {{ isset($proyecto) ? ($proyecto->tipoProyecto == 'Emprendimiento' ? 'selected' : '')
                       : 
                      (old('tipoProyecto') == 'Emprendimiento' ? 'selected' : '') }}>Emprendimiento</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="estProyecto">Estado</label>
                    <select id="estProyecto" name="estProyecto" class="form-control" >
                      <option value="">Seleccionar estado</option>
                      <option value="En curso"
                      {{ isset($proyecto) ? ($proyecto->estProyecto == 'En curso' ? 'selected' : '')
                       : 
                      (old('estProyecto') == 'En curso' ? 'selected' : '') }}>En curso</option>
                      <option value="Finalizado"
                      {{ isset($proyecto) ? ($proyecto->estProyecto == 'Finalizado' ? 'selected' : '')
                       : 
                      (old('estProyecto') == 'Finalizado' ? 'selected' : '') }}>Finalizado</option>
                      <option value="Inactivo"
                      {{ isset($proyecto) ? ($proyecto->estProyecto == 'Inactivo' ? 'selected' : '')
                       : 
                      (old('estProyecto') == 'Inactivo' ? 'selected' : '') }}>Inactivo</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="fecha_inicioPro">Fecha de Inicio</label>
                    <input type="date" id="fecha_inicioPro" name="fecha_inicioPro" class="form-control" 
                    value="{{ isset($proyecto) ? old('fecha_inicioPro', $proyecto->fecha_inicioPro) : old('fecha_inicioPro') }}"/>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="fecha_finPro">Fecha de Finalización</label>
                    <input type="date" id="fecha_finPro" name="fecha_finPro" class="form-control" 
                    value="{{ isset($proyecto) ? old('fecha_finPro', $proyecto->fecha_finPro) : old('fecha_finPro') }}"/>
                  </div> 
                  <div class="col-md-6">
                    <label class="form-label" for="PropProyecto">Propuesta</label>
                    <input type="file" id="PropProyecto" name="PropProyecto" class="form-control"/>
                  </div> 
                  <div class="col-md-6">
                    <label class="form-label" for="Proyecto_final">Proyecto Final</label>
                    <input type="file" id="Proyecto_final" name="Proyecto_final" class="form-control" />
                  </div> 
                </div>
                
              </fieldset>
              <div class="col-md-6">
                <label class="form-label" for="semillero_id">ID del Semillero</label>
                <select id="semillero_id" name="semillero_id" class="form-control">
                  <option value="">Seleccionar semillero</option>
                  @foreach ($semilleros as $semillero)
                      <option value="{{ $semillero->id }}"
                          {{ isset($proyecto) ? ($proyecto->semillero_id == $semillero->id ? 'selected' : '') :
                          (old('semillero_id') == $semillero->id ? 'selected' : '') }}
                      >{{ $semillero->nombre }}</option>
                  @endforeach
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

<style>
.error-container {
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 5px;
}

.error-heading {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.error-list {
    list-style-type: disc;
    margin-left: 20px;
}

.error-item {
    margin-bottom: 5px;
}


</style>
