@extends('layouts.layoutMaster')

@section('title', 'Evento show')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1@5.3.0-alpha1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('proyecto/estilos/indexBotones.css') }}">
<link rel="stylesheet" href="{{ asset('proyecto/estilos/index.css') }}">
@endsection

<!-- Page -->
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-profile.css')}}" />
@endsection


@section('vendor-script')
<script src="{{asset('assets/vendor/libs/jquery-sticky/jquery-sticky.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
@endsection

@section('content')
<div class="container mt-5">
    <h4 class="py-3 breadcrumb-wrapper mb-5">
        <span class="text-muted fw-light">Informacion /</span> Eventos
    </h4>

    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img alt="Event Image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" src="{{ asset('assets/eventos') . '/' . $evento->foto }}"
                            alt="Foto del evento" style="width: 150px; height: 150px;">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{$evento->nombre}}</h4>
                                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item fw-semibold">
                                        <i class='bx bx-calendar-alt'  style="color: rgb(203, 45, 45)"></i> Fecha:   <span class="fecha.inicio" style="color: rgb(76, 163, 41); font-size: 18px;">{{$evento->fecha_inicio}}</span>
                                    </li>
                                    <li class="list-inline-item fw-semibold">
                                        <i class="bx bx-map" style="color: rgb(230, 144, 25)"></i> Lugar:  <span class="lugar" style="color: rgb(76, 163, 41); font-size: 18px;">{{$evento->lugar}}</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{route('eventos.index')}}" class="btn btn-primary text-nowrap">
                                <i></i> Cerrar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    <!-- Event Profile Content -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Event Details -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">Detalles del evento</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-key" style="color: rgb(160, 156, 37)"></i><span class="fw-semibold mx-2" >No#:</span>
                            <span>{{$evento->codigo}}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-calendar-alt" style="color: rgb(203, 45, 45)"></i><span class="fw-semibold mx-2" >Fecha Inicio:</span>
                            <span>{{$evento->fecha_inicio}}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-calendar-alt" style="color: rgb(203, 45, 45)"></i><span class="fw-semibold mx-2">Fecha Fin:</span>
                            <span>{{$evento->fecha_fin}}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-map" style="color: rgb(230, 144, 25)"></i><span class="fw-semibold mx-2" >Lugar:</span>
                            <span>{{$evento->lugar}}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-book" style="color: rgb(50, 44, 126)"></i><span class="fw-semibold mx-2">Nombre Evento:</span>
                            <span>{{$evento->nombre}}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-file" style="color: rgb(126, 84, 44)"></i><span class="fw-semibold mx-2">Descripción:</span>
                            <span>{{$evento->descripcion}}</span></li>
                    </ul>

                    <small class="text-muted text-uppercase">Detalles adicionales</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-group" style="color: rgb(0, 192, 42)"></i><span class="fw-semibold mx-2">Tipo de Evento:</span>
                            <span>{{$evento->tipo}}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-building" style="color: rgb(0, 192, 42)"></i><span class="fw-semibold mx-2">Modalidad:</span>
                            <span>{{$evento->modalidad}}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-map-pin" style="color: rgb(0, 192, 42)"></i><span class="fw-semibold mx-2">Clasificación:</span>
                            <span>{{$evento->clasificacion}}</span></li>
                    </ul>

                    <small class="text-muted text-uppercase">Observaciones</small>
                    <ul class="list-unstyled mt-3 mb-0" >
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-message" style="color: rgba(192, 54, 0, 0.564)"></i><span> -  {{$evento->observaciones}}</span></li>
                    </ul>
                </div>
            </div>
            <style>
                /* Aplicar estilos al elemento con el ID "miTexto" */
                .d-flex {
                  font-family: "Arial", sans-serif; /* Cambiar la fuente del texto */
                  font-size: 18px; /* Cambiar el tamaño de fuente */
                  color: #333; /* Cambiar el color del texto */
                }
              </style>
            <!--/ Event Details -->
        </div>

        <div class="col-md-6">
          <div class="container mt-5">
              <div class="row">
                @role('admin')
                  <div class="col-md-12 text-right">
                      <h6>Añadir Proyectos</h6>
                      <!-- Botón para abrir el modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                          Proyectos
                      </button>
                  </div>
                  @endrole
                  @role('coordinador')
                  <div class="col-md-12 text-right">
                      <h6>Añadir Proyectos</h6>
                      <!-- Botón para abrir el modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                          Proyectos
                      </button>
                  </div>
                  @endrole
              </div>
              <br>
              <table class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>Proyectos Participantes</th>
                          @role('admin')
                          <th>Eliminar</th>
                          @endrole
                          @role('coordinador')
                          <th>Eliminar</th>
                          @endrole
                      </tr>
                  </thead>
                  <tbody>
                      @forelse($evento->proyectos as $proyecto)
                      <tr id="proyecto-{{ $proyecto->id }}">
                          <td>{{ $proyecto->nomProyecto }}</td>
                          @role('admin')
                          <td>
                            <form action="{{ route('eventos.proyectos-eliminar', [ 'proyecto' => $proyecto->codProyecto,'evento' => $evento->codigo]) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm">
                                      <i class="bx bx-trash"></i>
                                  </button>
                              </form>
                          </td>
                          @endrole
                          @role('coordinador')
                          <td>
                            <form action="{{ route('eventos.proyectos-eliminar', ['proyecto' => $proyecto->codProyecto,'evento' => $evento->codigo]) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm">
                                      <i class="bx bx-trash"></i>
                                  </button>
                              </form>
                          </td>
                          @endrole
                      </tr>
                      @empty
                      <tr>
                          <td colspan="2">No hay proyectos participantes</td>
                      </tr>
                      @endforelse
                  </tbody>
              </table>
          </div>
      </div>

      <!-- Modal -->
      <div class="modal" id="myModal">
          <div class="modal-dialog">
              <div class="modal-content">
                  <form action="{{ route('eventos.proyecto', $evento->codigo) }}" method="POST">
                      @csrf
                      <div class="modal-header">
                          <h4 class="modal-title">Proyectos Registrados</h4>
                      </div>
                      <div class="modal-body">
                          @foreach($proyectos as $proyecto)
                          <div>
                              <input type="checkbox" name="seleccionados[]" value="{{$proyecto->codProyecto}}">
                              {{$proyecto->nomProyecto}}
                          </div>
                          @endforeach
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Añadir</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      </div>
      </div>



    <!-- Incluir los scripts JavaScript necesarios -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
