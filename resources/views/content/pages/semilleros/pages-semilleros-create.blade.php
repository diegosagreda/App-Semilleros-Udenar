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
      <form action="{{ route('semilleros.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
          <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
            <h5 class="card-title mb-sm-0 me-2">Registro Semilleros</h5>
            <div class="action-btns">

              <a href="{{ route('pages-semilleros')}}" class="btn btn-danger">
                <span class="align-middle">Cancelar</span>
              </a>
              <button type="" class="btn btn-primary">
                Guardar
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <!--Seccion informacion personal-->
                <fieldset class="border p-4 mb-5">
                    <legend class="w-auto">Datos de contacto</legend>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label" for="identificacion">Nombre</label>
                        <input type="text" id="nombreSemillero" name="nombreSemillero" class="form-control" value="Nuevo semillero" required/>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="nombre">Responsable</label>
                        <input type="text" id="nombreSemillerista" name="nombreSemillerista" class="form-control" value="responsable" required/>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="email">Correo</label>
                        <div class="input-group input-group-merge">
                          <input class="form-control" type="email" id="correo" name="correo" placeholder="alguien" value="semilleros@udenar.edu.co" aria-label="alguien" aria-describedby="email3" required/>
                          <span class="input-group-text" id="email3">@example.com</span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="telefono">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" value="3246553535" required/>
                      </div>
                        <div class="col-md-6">
                        <label class="form-label" for="genero">Sede</label>
                        <select id="sede" name="sede" class="select2 form-select" data-allow-clear="true" @selected(true) required>
                          <option value="">Selecciona</option>
                          <option value="Pasto">Pasto</option>
                          <option value="Ipiales">Ipiales</option>
                          <option value="Tumaco">Tumaco</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="foto">Logo</label>
                        <input name="logo" type="file" class="form-control" id="logo" placeholder="Foto" required accept="image/png, image/jpeg">
                       </div>
                      <div class="col-12">
                        <label class="form-label" for="direccion">Dirección</label>
                        <textarea name="direccion" class="form-control" id="direccion" rows="1" required>Direccion</textarea>
                      </div>
                </fieldset>
                <fieldset class="border p-4 mb-5">
                    <legend class="w-auto">Información del semillero</legend>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label" for="genero">lineas de investigación</label>
                        <input type="text" id="lineas_investigacion" name="lineas_investigacion" class="form-control" value="lineas de investigacion" required/>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="telefono">Resolución del semillero</label>
                        <input type="text" id="numero_resolucion" name="numero_resolucion" class="form-control" value="resolucion del semillero" required/>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Archivo resolucion</label>
                        <input name="arhivo_resolucion" type="file" class="form-control" id="arhivo_resolucion" name="arhivo_resolucion" required accept="application/pdf">
                    </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3">Descripcion</textarea>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Presentacion</label>
                      <textarea class="form-control" id="presentacion" name="presentacion" rows="3">Presentacion</textarea>
                  </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Misión</label>
                        <textarea class="form-control" id="mision" name="mision" rows="3">Mision</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Visión</label>
                        <textarea class="form-control" id="vision" name="vision" rows="3">Vision</textarea>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Valores</label>
                      <textarea class="form-control" id="valores" name="valores" rows="3">Valores</textarea>
                  </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Objetivos</label>
                        <textarea class="form-control" id="objetivos" name="objetivos" rows="3">Objetivos</textarea>
                    </div>
                    </div>
                  </fieldset>
              </div>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
<!-- /Sticky Actions -->
@endsection
