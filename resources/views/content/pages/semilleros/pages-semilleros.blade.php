@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="py-3 breadcrumb-wrapper mb-4">
  <span class="text-muted fw-light">Gestión |</span> Semilleros
</h4>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Semilleros</a>

    <a href="{{route('semilleros.create')}}" class="btn btn-primary text-nowrap">
      <i class='bx bx-user'></i> Nuevo
    </a>
  </div>
</nav>

<!-- Bordered Table -->
<div class="card">
  <h5 class="card-header">Lista de semilleros</h5>
  <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Proyecto</th>
            <th>Coordinador</th>
            <th>Semilleristas</th>
            <th>Correo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @forelse ($semilleros as $semillero)
          <tr>
            <td><strong>{{ $semillero->nombre }}</strong></td>
            <td>Sandra Marcela Guerrero Calvache</td>
            <td>
              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                  <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                  <img src="{{asset('assets/img/avatars/6.png')}}" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                  <img src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle">
                </li>
              </ul>
            </td>
            <td><span class="badge bg-label-primary me-1">{{ $semillero->correo }}</span></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('semilleros.view')}}"><i class="bx bx-search-alt me-1"></i> Ver</a>
                  <a class="dropdown-item" href="{{route('semilleros.edit')}}"><i class="bx bx-edit-alt me-1"></i> Editar</a>
                  <a class="dropdown-item" href="{{ route('semilleros.destroy', $semillero->id) }}"
                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $semillero->id }}').submit();">
                     <i class="bx bx-trash me-1"></i> Eliminar
                 </a>
                 <form id="delete-form-{{ $semillero->id }}" action="{{ route('semilleros.destroy', $semillero->id) }}"
                       method="POST" style="display: none;">
                     @csrf
                     @method('DELETE')
                 </form>
                </div>
              </div>
            </td>
          </tr>
          @empty
                <p>No hay registros</p>
            @endforelse

        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
