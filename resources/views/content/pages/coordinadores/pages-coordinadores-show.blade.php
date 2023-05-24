@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Coordinadores')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-body">
            <fieldset class="border p-3 mb-3">
              <legend class="w-auto">Semillero <strong>{{$coordinador->semillero->nombre}}</strong> </legend>
              <div class="form-group">
                  <div class="text-center mb-3">
                    <img class="test" src="{{ asset('assets/profile') . '/' . $coordinador->foto }}"
                    alt="Foto del coordinador" class="img-fluid rounded-circle" width="100" height="100">
                  </div>
              </div>
              
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group mb-2">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" value="{{$coordinador->nombre}}" readonly>
                      </div>
                      <div class="form-group mb-2">
                        <label for="identificacion">Identificación:</label>
                        <input type="text" class="form-control" id="identificacion" value="{{$coordinador->identificacion}}" readonly>
                      </div>
                      <div class="form-group mb-2">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" id="direccion" value="{{$coordinador->direccion}}" readonly>
                      </div>
                      <div class="form-group mb-2">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono" value="{{$coordinador->telefono}}" readonly>
                      </div>
                      <div class="form-group mb-2">
                        <label for="correo">Correo:</label>
                        <input type="text" class="form-control" id="correo" value="{{$coordinador->correo}}" readonly>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-2">
                      <label for="genero">Género:</label>
                      <input type="text" class="form-control" id="genero" value="{{$coordinador->genero}}" readonly>
                    </div>
                    <div class="form-group mb-2">
                      <label for="fecha_nacimiento">Fecha nacimiento:</label>
                      <input type="text" class="form-control" id="fecha_nacimiento" value="{{$coordinador->fecha_nacimiento}}" readonly>
                    </div>
                    <div class="form-group mb-2">
                      <label for="programa_academico">Programa académico:</label>
                      <input type="text" class="form-control" id="programa_academico" value="{{$coordinador->programa_academico}}" readonly>
                    </div>
                    <div class="form-group mb-2">
                      <label for="areas_conocimiento">Áreas conocimiento:</label>
                      <input type="text" class="form-control" id="areas_conocimiento" value="{{$coordinador->areas_conocimiento}}" readonly>
                    </div>
                    <div class="form-group mb-2">
                      <label for="fecha_vinculacion">Fecha vinculación:</label>
                      <input type="text" class="form-control" id="fecha_vinculacion" value="{{$coordinador->fecha_vinculacion}}" readonly>
                    </div>
                    <div class="form-group mb-2">
                      <label for="acuerdo_nombramiento">Acuerdo nombramiento</label>
                      <input type="text" class="form-control" id="acuerdo_nombramiento" value="{{$coordinador->acuerdo_nombramiento}}"readonly>

                    </div>
                    </div>
                </div>
              <div class="form-group">
                <a class="btn btn-primary" href="{{route('pages-coordinadores')}}">Cerrar</a>
              </div>
             
            </fieldset>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
    .test{
      height: 100px;
      width: 100px;
      border-radius: 50%;
    }
  </style>
  
@endsection