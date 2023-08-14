@extends('layouts/layoutMaster')

@section('title', 'Sticky Actions - Forms')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<!--Input upload file-->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/jquery-sticky/jquery-sticky.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<!--Input upload file-->
<script src="{{asset('assets/vendor/libs/dropzone/dropzone.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
<!--Input upload file-->
<script src="{{asset('assets/js/forms-file-upload.js')}}"></script>
@endsection


@section('content')


@section('content')
<!-- Sticky Actions -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <form action="{{ route('semilleros.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
            <div class="botones card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
            <h5 class="card-title mb-sm-0 me-2">Registro Semilleros</h5>
            <div class="action-btns">

              <a href="{{ route('pages-semilleros')}}" class="btn btn-danger">
                <span class="align-middle">Cancelar</span>
              </a>
              <button type="submit" class="btn btn-primary" >
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
                      <!--Logo-->

                      <div class="col-md-12 mb-3">
                        <div class="d-flex flex-column align-items-center align-items-sm-center gap-4">
                          <img src="{{ asset('assets/img/avatars/avatar.png')}}" alt="user-avatar" class="rounded-circle h-px-100 w-px-100" height="100" width="100" id="uploadedAvatar" />
                          <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                              <i class="bx bx-upload d-block "></i>
                              <input name="logo" type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg"/>
                            </label>
                         <button id="btn-reset" type="button" class="btn btn-label-secondary account-image-reset mb-4">
                              <i class="bx bx-reset d-block"></i>
                            </button>
                            <p class="mb-0">Permitido JPG o PNG</p>
                          </div>
                        </div>
                      </div>

                      <!--Identificacion-->
                      <div class="col-md-6">
                        <label class="form-label" for="identificacion">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre semillero" required/>
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
                      <div class="col-md-12">
                        <label class="form-label" for="email">Correo</label>
                        <div class="input-group input-group-merge">
                          <input class="form-control" type="email" id="correo" name="correo" placeholder="semilleros@udenar.edu.co" aria-label="alguien" aria-describedby="email3" required/>
                          <span class="input-group-text" id="email3">@example.com</span>
                        </div>
                      </div>
                </fieldset>
                <fieldset class="border p-4 mb-5">
                    <legend class="w-auto">Información del semillero</legend>
                    <div class="row g-3">
                      <div class="col-md-12">
                        <label class="form-label" for="genero"></label>
                        <input type="text" id="lineas_investigacion" name="lineas_investigacion" class="form-control" placeholder="lineas de investigacion" required/>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Presentacion</label>
                      <textarea class="form-control" id="presentacion" name="presentacion" rows="3"></textarea>
                  </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Misión</label>
                        <textarea class="form-control" id="mision" name="mision" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Visión</label>
                        <textarea class="form-control" id="vision" name="vision" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Valores</label>
                      <textarea class="form-control" id="valores" name="valores" rows="3"></textarea>
                  </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Objetivos</label>
                        <textarea class="form-control" id="objetivos" name="objetivos" rows="3"></textarea>
                    </div>
                    </div>
                  </fieldset>
                  <!--Sticky form-->
                  <div class="col-12">
                    <div class="card mb-4">
                      <h5 class="card-header">Acuerdo de nombramiento</h5>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label class="form-label" for="numero_resolucion">Número de resolución</label>
                            <input type="number" id="numero_resolucion" name="numero_resolucion" class="form-control" min="0" placeholder="0" required />
                          </div>
                          <div class="col-md-6 mb-3">
                            <label class="form-label" for="arhivo_resolucion">Archivo resolución</label>
                            <input name="archivo_resolucion" type="file" class="form-control" id="archivo_resolucion" name="archivo_resolucion" required accept="application/pdf">
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

<script>
  document.getElementById('btn-reset').addEventListener('click', ()=>{
    document.getElementById('uploadedAvatar').src = "{{ url('assets/img/avatars/avatar.png') }}";
  })

  //Funcion para hacer el preview de la foto subida para el coordinador
  function handleFileSelect(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById('uploadedAvatar').src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
  document.getElementById('upload').addEventListener('change', handleFileSelect);

  function mostrarConfirmacion() {
    if (confirm("¿Estás seguro de que deseas guardar los datos?")) {
      // Si el usuario hace clic en "Aceptar", envía el formulario
      document.querySelector('form').submit();
    } else {
      // Si el usuario hace clic en "Cancelar", no hace nada
    }
  }

</script>
<!-- /Sticky Actions -->
@endsection

<style>
  .botones{
    position: sticky;
    top:0;
    background-color: white; /* Asegura que el fondo sea opaco */
    z-index: 100;
    background-color: blue;
  }
  .divs{
    background-color: bisque
  }
</style>
