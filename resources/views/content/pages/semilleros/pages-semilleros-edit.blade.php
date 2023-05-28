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
      <form action="{{ route('coordinadores.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
          <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
            <h5 class="card-title mb-sm-0 me-2">Actualizar Semillero</h5>
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
                        <input type="text" id="identificacion" name="identificacion" class="form-control" required/>
                      </div> 
                      <div class="col-md-6">
                        <label class="form-label" for="nombre">Responsable</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required/>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="email">Correo</label>
                        <div class="input-group input-group-merge">
                          <input class="form-control" type="email" id="email" name="correo" placeholder="alguien" aria-label="alguien" aria-describedby="email3" required/>
                          <span class="input-group-text" id="email3">@example.com</span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="telefono">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control phone-mask" required/>
                      </div>
                      
                        <div class="col-md-6">
                        <label class="form-label" for="genero">Sede</label>
                        <select id="genero" name="genero" class="select2 form-select" data-allow-clear="true" required>
                          <option value="">Selecciona zona</option>
                          <option value="femenino">Pasto</option>
                          <option value="masculino">Ipiales</option>
                          <option value="masculino">Tumaco</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="foto">Logo</label>
                        <input name="foto" type="file" class="form-control" id="foto" placeholder="Foto" required>
                       </div>
                      <div class="col-12">
                        <label class="form-label" for="direccion">Dirección</label>
                        <textarea name="direccion" class="form-control" id="direccion" rows="1" required></textarea>
                      </div>
                      
                </fieldset>
                <!--Seccion formacion academica-->
                <fieldset class="border p-4 mb-5">
                    <legend class="w-auto">Información del semillero</legend>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label" for="genero">lineas de investigación</label>
                        <select id="genero" name="genero" class="select2 form-select" data-allow-clear="true" required>
                          <option value="">Selecciona zona</option>
                          <option value="femenino">Pasto</option>
                          <option value="masculino">Ipiales</option>
                          <option value="masculino">Tumaco</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="telefono">Resolución del semillero</label>
                        <input type="text" id="resolucion" name="resolucion" class="form-control phone-mask" required/>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Misión</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Visión</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Objetivos</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
