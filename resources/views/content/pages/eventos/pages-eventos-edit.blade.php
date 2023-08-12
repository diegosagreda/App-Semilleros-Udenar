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
      <form action="{{ route('eventos.update', $evento->codigo) }}" method="POST" enctype="multipart/form-data">
        @csrf
      @method('PUT')
        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
          <h5 class="card-title mb-sm-0 me-2">Actualizar Evento</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <!--Seccion informacion personal-->
              <br>
              <fieldset class="border p-4 mb-5">
                <legend class="w-auto">Información Evento</legend>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="codigo">Codigo</label>
                    <input type="text" id="codigo" name="codigo" class="form-control" value="{{ $evento->codigo }}" required readonly/>
                  </div> 
                  <div class="col-md-6">
                    <label class="form-label" for="nombre">Nombre Evento</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $evento->nombre }}" required />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="descripcion">Descripcion</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ $evento->descripcion }}" required/>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="tipo">Tipo Evento</label>
                    <select id="tipo" name="tipo" class="select2 form-select" data-allow-clear="true" @selected(true) required >
                      <option value="">Selecciona Tipo evento</option>
                      <option value="Congreso" {{$evento->tipo == 'Congreso' ? 'selected' : ''}}>Congreso</option>
                      <option value="Encuentro" {{$evento->tipo == 'Encuentro' ? 'selected' : ''}}>Encuentro</option>
                      <option value="Seminario" {{$evento->tipo == 'Seminario' ? 'selected' : ''}}>Seminario</option>
                      <option value="Taller" {{$evento->tipo == 'Taller' ? 'selected' : ''}}>Taller</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="modalidad">Modalidad</label>
                    <select id="modalidad" name="modalidad" class="select2 form-select" data-allow-clear="true" @selected(true) required>
                      <option value="">Selecciona Modalidad</option>
                      <option value="Virtual" {{$evento->modalidad == 'Virtual' ? 'selected' : ''}}>Virtual</option>
                      <option value="Presencial" {{$evento->modalidad == 'Presencial' ? 'selected' : ''}}>Presencial</option>
                      <option value="Hibrida"  {{$evento->modalidad == 'Hibrida' ? 'selected' : ''}}>Híbrida</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="clasificacion">Clasificación </label>
                    <select id="clasificacion" name="clasificacion" class="select2 form-select" data-allow-clear="true">
                      <option value="">Selecciona Clasificación</option>
                      <option value="Local" {{$evento->clasificacion == 'Local' ? 'selected' : ''}}>Local</option>
                      <option value="Regional" {{$evento->clasificacion == 'Regional' ? 'selected' : ''}}>Regional</option>
                      <option value="Nacional" {{$evento->clasificacion == 'Nacional' ? 'selected' : ''}}>Nacional</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label" for="lugar">Lugar Evento</label>
                    <textarea name="lugar" class="form-control" id="lugar" rows="1" required>{{ $evento->lugar }}</textarea>
                </div>
                  <div class="col-md-6">
                    <label class="form-label" for="fecha_inicio">Fecha Inicio del evento</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control"  value="{{ $evento->fecha_inicio }}" required/>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="fecha_fin">Fecha Fin del Evento</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" value="{{ $evento->fecha_fin }}" required />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="observaciones">Observaciones</label>
                    <div class="input-group input-group-merge">
                      <textarea name="observaciones" class="form-control" id="observaciones" rows="1"  required>{{ $evento->observaciones }}</textarea>
                    </div>
                  </div>
                </div>
                <br>
                <!--<div class="col-12">
                  <label class="form-label" for="foto">Foto del Evento</label>
                  <input type="file" id="foto" name="foto" class="form-control" />
                </div>-->
                <div class="d-flex flex-column align-items-center align-items-sm-center gap-4">
                  <img src="{{ asset('assets/eventos') . '/' . $evento->foto }}" alt="user-avatar" class=" h-px-205 w-px-200" height="100" width="100" id="uploadedAvatar" />
                  <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                      <i class="bx bx-upload d-block "></i>
                      <input name="foto" type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg"/>
                    </label>
                    <button id="btn-reset" type="button" class="btn btn-label-secondary account-image-reset mb-4">
                      <i class="bx bx-reset d-block"></i>
                    </button>
                    <p class="mb-0">Permitido JPG o PNG</p>
                  </div>
                </div>
            </div>
            <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
              <h5 class="card-title mb-sm-0 me-2">Eventos</h5>
              <div class="action-btns">
                <div class="action-btns">
                  <a href="{{ route('eventos.index')}}" class="btn btn-danger">
                    <span class="align-middle">Cancelar</span>
                  </a>
                  <button type="submit" class="btn btn-primary">
                    Guardar
                  </button>
                </div>
              </div>
            </div>

              </div>
            </div>
          </div>
        </div>
       
      </form>
     
    </div>
  </div>
</div>
<!-- /Sticky Actions -->

@endsection