@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Coordinadores')

@section('content')
<div class="container">

    <!--Sección tabla coordinadores-->
    <h3 class="pb-4">Gestión coordinadores</h3>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="{{ route ('coordinadores.create')}}" class="btn btn-success">Nuevo</a>
            <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Nombre" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
      </nav>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Indentificación</th>
            <th scope="col">Nombres</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>
        <tbody>

          @forelse ($coordinadores as $coordinador)
            <tr>
              <td>{{$coordinador->identificacion}}</td>
              <td>{{$coordinador->nombre}}</td>
              <td>
                <a class="btn btn-primary" href="{{ route('coordinadores.show', $coordinador->identificacion)}}">Ver</a>
                <a class="btn btn-warning" href="{{ route ('coordinadores.edit',$coordinador->identificacion)}}">Editar</a>
                <form style="display: inline;" method="POST" action="{{route ('coordinadores.destroy',$coordinador->identificacion)}}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Eliminar</button>
                </form>
                
              </td>
            </tr>
          @empty
              <p>Sin registros</p>
          @endforelse
        </tbody>
      </table>


    </div>

@endsection
