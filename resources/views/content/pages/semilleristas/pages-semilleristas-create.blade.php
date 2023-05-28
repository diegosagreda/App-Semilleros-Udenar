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
      <form action="{{ route('semilleristas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
          <h5 class="card-title mb-sm-0 me-2">Registro semillerista</h5>
          <div class="action-btns">
            <a href="{{ route('pages-semilleristas')}}" class="btn btn-danger">
              <span class="align-middle">Cancelar</span>
            </a>
            <button type="submit" class="btn btn-primary">
              Guardar
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <fieldset class="border p-4 mb-5">
                  <legend class="w-auto">Información Personal</legend>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label" for="identificacion">Identificacion</label>
                      <input type="text" id="identificacion" name="identificacion" class="form-control" />
                    </div> 
                    <div class="col-md-6">
                      <label class="form-label" for="codigo">Código</label>
                      <input type="text" id="codigo" name="codigo" class="form-control" />
                    </div> 
                    <div class="col-md-6">
                      <label class="form-label" for="nombre">Nombre completo</label>
                      <input type="text" id="nombre" name="nombre" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="email">Correo</label>
                      <div class="input-group input-group-merge">
                        <input class="form-control" type="email" id="email" name="correo" placeholder="alguien" aria-label="alguien" aria-describedby="email3" />
                        <span class="input-group-text" id="email3">@example.com</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="telefono">Teléfono</label>
                      <input type="text" id="telefono" name="telefono" class="form-control phone-mask" />
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="genero">Género</label>
                      <select id="genero" name="genero" class="select2 form-select" data-allow-clear="true">
                        <option value="">Selecciona genero</option>
                        <option value="femenino">Femenino</option>
                        <option value="masculino">Masculino</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <label class="form-label" for="direccion">Dirección</label>
                      <textarea name="direccion" class="form-control" id="direccion" rows="1"></textarea>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="fecha_nacimiento">Fecha nacimiento</label>
                      <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" />
                    </div>
                  </div>
              </fieldset>
              <fieldset class="border p-4 mb-5">
                  <legend class="w-auto">Información Académica</legend>
                  <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label" for="programa_academico">Programa académico</label>
                        <input type="text" id="programa_academico" name="programa_academico" class="form-control" />
                      </div> 
                      <div class="col-md-6">
                        <label class="form-label" for="semestre">Semestre</label>
                        <input type="number" id="semestre" name="semestre" class="form-control" />
                      </div>  
                  </div>
              </fieldset>
              <fieldset class="border p-4 mb-5">
                  <legend class="w-auto">Asignár a semillero</legend>
                  <div class="row gy-3">
                    <div class="col-md">
                      <div class="form-check custom-option custom-option-icon">
                        <label class="form-check-label custom-option-content" for="customRadioIcon1">
                          <span class="custom-option-body">
                            <i class='bx bx-crown'></i>
                            <span class="custom-option-title"> Semillero 1 </span>
                            <small>Pasto</small>
                          </span>
                          <input name="semillero_id" class="form-check-input" type="radio" value="" id="customRadioIcon1" checked />
                        </label>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-check custom-option custom-option-icon">
                        <label class="form-check-label custom-option-content" for="customRadioIcon2">
                          <span class="custom-option-body">
                            <i class='bx bx-crown'></i>
                            <span class="custom-option-title">Semillero 2 </span>
                            <small>Ipiales</small>
                          </span>
                          <input name="semillero_id" class="form-check-input" type="radio" value="" id="customRadioIcon2" />
                        </label>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-check custom-option custom-option-icon">
                        <label class="form-check-label custom-option-content" for="customRadioIcon3">
                          <span class="custom-option-body">
                            <i class='bx bx-crown'></i>
                            <span class="custom-option-title"> Semillero 3 </span>
                            <small> Tumaco </small>
                          </span>
                          <input name="semillero_id" class="form-check-input" type="radio" value="" id="customRadioIcon3" />
                        </label>
                      </div>
                    </div>
                  </div>
              </fieldset>
              <div class="row g-3" style="display: none">
                
                <div class="col-12 col-md-10 col-xxl-8">  
                  <div class="row">
                    <div class="col-6 col-md-3">
                      <div class="mb-3">
                        <label class="form-label" for="collapsible-payment-cvv">CVV Code</label>
                        <div class="input-group input-group-merge">
                          <input type="text" id="collapsible-payment-cvv" class="form-control cvv-code-mask" maxlength="3" placeholder="654" />
                          <span class="input-group-text cursor-pointer" id="collapsible-payment-cvv2"><i class="bx bx-help-circle text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Card Verification Value"></i></span>
                        </div>
                      </div>
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
