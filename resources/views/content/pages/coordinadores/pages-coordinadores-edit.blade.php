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


<!-- Sticky Actions -->
<div class="row">
  <div class="col-12">
    <div class="card">
      @if (session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
      @endif

      <form action="{{ route('coordinadores.update', $coordinador->identificacion) }}" method="POST" enctype="multipart/form-data">
           @csrf
           @method("PUT")
          <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
            <h5 class="card-title mb-sm-0 me-2">Actualizar información coordinador</h5>
            <div class="action-btns">

              <a href="{{ route('pages-coordinadores')}}" class="btn btn-danger">
                <span class="align-middle">Cancelar</span>
              </a>
              <button type="submit" class="btn btn-primary">
                Actualizar
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <!--Seccion informacion personal-->
                <fieldset class="border p-4 mb-5">
                  <legend class="w-auto">Información Personal</legend>
                  <div class="row g-3">
                      <!--Foto-->
                      <div class="col-md-12 mb-3">
                        <div class="d-flex flex-column align-items-center align-items-sm-center gap-4">
                          <img src="{{ asset('assets/img_coordinadores') . '/' . $coordinador->foto }}" alt="user-avatar" class="rounded-circle h-px-100 w-px-100" height="100" width="100" id="uploadedAvatar" />
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
                      <!--Identificacion-->
                      <div class="col-md-6">
                        <label class="form-label" for="identificacion">Identificacion</label>
                        <input disabled value="{{$coordinador->identificacion}}" type="number" id="identificacion" name="identificacion" class="form-control" required/>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="nombre">Nombre completo</label>
                        <input value="{{$coordinador->nombre}}" type="text" id="nombre" name="nombre" class="form-control" required/>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="email">Correo</label>
                        <div class="input-group input-group-merge">
                          <input value="{{$coordinador->correo}}" class="form-control" type="email" id="email" name="correo"  aria-label="alguien" aria-describedby="email3" required/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="telefono">Teléfono</label>
                        <input value="{{$coordinador->telefono}}" type="text" id="telefono" name="telefono" class="form-control phone-mask" required/>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="genero">Género</label>
                        <select id="genero" name="genero" class="select2 form-select" data-allow-clear="true" required>
                          <option value="">Selecciona género</option>
                          <option value="femenino" {{$coordinador->genero == 'femenino' ? 'selected' : ''}}>Femenino</option>
                          <option value="masculino" {{$coordinador->genero == 'masculino' ? 'selected' : ''}}>Masculino</option>
                        </select>

                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="fecha_nacimiento">Fecha nacimiento</label>
                        <input value="{{$coordinador->fecha_nacimiento}}" type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control"/>
                      </div>
                      <div class="col-12">
                        <label class="form-label" for="direccion">Dirección</label>
                        <textarea  name="direccion" class="form-control" id="direccion" rows="1" required>{{$coordinador->direccion}}</textarea>
                      </div>
                    </div>
                </fieldset>
                <!--Seccion formacion academica-->
                <fieldset class="border p-4 mb-5">
                    <legend class="w-auto">Información Académica</legend>
                    <div class="row g-3">
                        <div class="col-md-6">
                          <label class="form-label" for="programa_academico">Programa académico</label>
                          <input value="{{$coordinador->programa_academico}}" type="text" id="programa_academico" name="programa_academico" class="form-control" required/>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="areas_conocimiento">Áreas conocimiento</label>
                          <input value="{{$coordinador->areas_conocimiento}}" type="text " id="areas_conocimiento" name="areas_conocimiento" class="form-control" required/>
                        </div>
                    </div>
                </fieldset>
                 <!--Seccion asignacion semillero-->
                 <fieldset class="border p-4 mb-5">
                  <legend class="w-auto">Asignár a semillero</legend>
                  <div class="row gy-3">
                    @forelse ($semilleros as $index => $semillero)
                      <div class="col-md">
                        <div class="form-check custom-option custom-option-icon">
                          <label class="form-check-label custom-option-content" for="customRadioIcon{{$index}}">
                            <span class="custom-option-body">
                              <i class='bx bx-crown'></i>
                              <small>Semillero</small>
                              <span class="custom-option-title">{{$semillero->nombre}}</span>
                            </span>
                            <input name="semillero_id" class="form-check-input" type="radio" value="{{$semillero->id}}" id="customRadioIcon{{$index}}" required {{$semillero->id === $coordinador->semillero->id ? 'checked' : ''}} />
                          </label>
                        </div>
                      </div>
                    @empty

                    @endforelse
                  </div>
              </fieldset>
                <!--Sticky form-->
                 <div class="row g-3" style="display: none">
                   <div class="col-12 col-md-10 col-xxl-8">
                     <div class="row">
                       <div class="col-6 col-md-3">
                         <div class="mb-3">
                           <label class="form-label" for="collapsible-payment-cvv">CVV Code</label>
                           <div class="input-group input-group-merge">
                             <input  type="text" id="collapsible-payment-cvv" class="form-control cvv-code-mask" maxlength="3" placeholder="654" />
                             <span class="input-group-text cursor-pointer" id="collapsible-payment-cvv2"><i class="bx bx-help-circle text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Card Verification Value"></i></span>
                            </div>
                          </div>

                       </div>
                     </div>
                   </div>
                 </div>
                 <!--Input load file-->
                 <div class="col-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Acuerdo de nombramiento</h5>
                    <div class="card-body">
                      <div class="mb-3">
                        <input value="{{$coordinador->acuerdo_nombramiento}}" name="acuerdo_nombramiento" type="file" class="form-control" accept="application/pdf">
                      </div>
                      <iframe src="{{ asset('assets/docs_coordinadores/' . $coordinador->acuerdo_nombramiento) }}" style="width:500px; height:500px;" frameborder="0"></iframe>
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



</script>
<!-- /Sticky Actions -->
@endsection


