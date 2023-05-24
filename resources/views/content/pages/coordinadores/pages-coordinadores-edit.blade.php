@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Coordinadores')

@section('content')
   
  <form action="{{ route('coordinadores.update', $coordinador->identificacion) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="card-body">
        <h3 class="card-title">Actualizár información coordinador</h3>
        <div class="row">
            <div class="col-md-6">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required min="3" value="{{$coordinador->nombre}}">
                <label for="identificacion">Identificación:</label>
                <input type="number" class="form-control" id="identificacion" name="identificacion" required value="{{$coordinador->identificacion}}">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{$coordinador->direccion}}">
                <label for="telefono">Teléfono:</label>
                <input type="number" class="form-control" id="telefono" name="telefono" value="{{$coordinador->telefono}}">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" value="{{$coordinador->correo}}">
            </div>
            <div class="col-md-6">
                <label for="genero">Género:</label>
                <select class="form-control" id="genero" name="genero" value="{{$coordinador->genero}}">
                    <option value="">Selecciona género</option>
                    <option value="masculino" @if($coordinador->genero === 'masculino') selected @endif>Masculino</option>
                    <option value="femenino"  @if($coordinador->genero === 'femenino') selected @endif>Femenino</option>
                </select>
                <label for="fecha_nacimiento">Fecha nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{$coordinador->fecha_nacimiento}}">
                <label for="programa_academico">Programa académico:</label>
                <input type="text" class="form-control" id="programa_academico" name="programa_academico" value="{{$coordinador->programa_academico}}">
                <label for="areas_conocimiento">Áreas conocimiento:</label>
                <input type="text" class="form-control" id="areas_conocimiento" name="areas_conocimiento" value="{{$coordinador->areas_conocimiento}}">
                <label for="fecha_vinculacion">Fecha vinculación:</label>
                <input type="date" class="form-control" id="fecha_vinculacion" name="fecha_vinculacion" value="{{$coordinador->fecha_vinculacion}}">
                <label for="foto">Foto</label>
                <input name="foto" type="file" class="form-control" id="foto" placeholder="Foto" value="{{$coordinador->foto}}">
                <label for="acuerdo_nombramiento">Acuerdo nombramiento</label>
                <input name="acuerdo_nombramiento" type="text" class="form-control" id="acuerdo_nombramiento" value="{{$coordinador->acuerdo_nombramiento}}">
            </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ route('pages-coordinadores')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
  </form>
@endsection