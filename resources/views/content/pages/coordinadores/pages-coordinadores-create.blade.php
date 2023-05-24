@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Coordinadores')

@section('content')
<form action="{{ route('coordinadores.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <h3 class="card-title">Registro coordinador</h3>
        <div class="row">
            <fieldset class="border p-3 mb-3">
                <legend class="w-auto">Información personal</legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required min="3">
                        </div>
                        <div class="form-group mb-2">
                            <label for="identificacion">Identificación:</label>
                            <input type="number" class="form-control" id="identificacion" name="identificacion" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="direccion">Dirección:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="telefono">Teléfono:</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="fecha_nacimiento">Fecha nacimiento:</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="correo">Correo:</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="genero">Género:</label>
                            <select class="form-control" id="genero" name="genero" required>
                                <option value="">Selecciona género</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="foto">Foto</label>
                            <input name="foto" type="file" class="form-control" id="foto" placeholder="Foto" >
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border p-3">
                <legend class="w-auto">Información académica</legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="programa_academico">Programa académico:</label>
                            <input type="text" class="form-control" id="programa_academico" name="programa_academico" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="areas_conocimiento">Áreas conocimiento:</label>
                            <input type="text" class="form-control" id="areas_conocimiento" name="areas_conocimiento" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="fecha_vinculacion">Fecha vinculación:</label>
                            <input type="date" class="form-control" id="fecha_vinculacion" name="fecha_vinculacion" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="acuerdo_nombramiento">Acuerdo nombramiento</label>
                            <input name="acuerdo_nombramiento" type="text" class="form-control" id="acuerdo_nombramiento" placeholder="Foto">
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="row pt-4">
        
                <fieldset class="border p-3">
                    <legend class="w-auto">Información semillero</legend>
                    <select class="form-control" id="semillero" name="semillero_id" required>
                        <option value="">Selecciona semillero</option>
                        @forelse ($semilleros as $semillero)
                        <option value="{{$semillero->id}}">{{$semillero->nombre}}</option>    
                        @empty
                        <option value="">No hay semilleros</option> 
                        @endforelse
                    </select>
                
                </fieldset>
           
        </div>
    </div>
        <div class="modal-footer">
            <a href="{{ route('pages-coordinadores')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
  </form>
@endsection