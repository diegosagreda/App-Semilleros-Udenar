@extends('layouts/layoutMaster')

@section('title', 'Detalles')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
<link rel="stylesheet" href="{{asset('proyecto/estilos/showblade.css')}}">
@endsection

<!-- Page -->
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-profile.css')}}" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection


@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-profile.js')}}"></script>
@endsection


@section('content')
<div class="container">
    @if(session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-white">Detalles del Proyecto</h2>
                </div>
                <div class="card-body">
                    <div class="row details">
                        <div class="details  col-md-3">
                            <p class="card-title">Nombre:</p>
                            <p class="card-text">{{ $proyecto->nomProyecto }}</p>
                        </div>
                        <div  class="col-md-3">
                            <p class="card-title">Semillero:</p>
                            <p class="card-text">{{ $proyecto->semillero->nombre }}</p>
                        </div>
                    </div>

                    <div class="details">
                        <p class="card-title">Código:</p>
                        <p class="card-text">{{ $proyecto->codProyecto }}</p>
                    </div>

                    <div class="details">
                        <p class="card-title">Tipo:</p>
                        <p class="card-text">{{ $proyecto->tipoProyecto }}</p>
                    </div>

                    <div class="details">
                        <p class="card-title">Número de integrantes:</p>
                        <p class="card-text">{{ $proyecto->numero_integrantes }}</p>
                    </div>

                    <div class="details">
                        <p class="card-title">Estado:</p>
                        <p class="card-text">{{ $proyecto->estProyecto }}</p>
                    </div>

                    <div class="row details">
                        <div class="col-md-6">
                            <p class="card-title">Fecha de inicio:</p>
                            <p class="card-text">{{ $proyecto->fecha_inicioPro }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-title">Fecha de fin:</p>
                            <p class="card-text">{{ $proyecto->fecha_finPro }}</p>
                        </div>
                    </div>
                    <div class="gif-container">
                        <img src="{{ asset('proyecto/paloma.gif') }}" alt="GIF" class="gif"> <!-- Cambiar la URL del GIF aquí -->
                    </div>
                    <div class="edit-cancel">
                        <a href="{{ route('proyectos.edit', $proyecto->codProyecto) }}" class="btn btn-success mr-2"><i class="fas fa-edit"></i>Editar</a>
                        <a href="/proyectos" class="btn btn-danger ml-2"><i class="fas fa-times"></i>Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Agregar el GIF -->

<!-- Agregar los scripts de Bootstrap y Font Awesome al final del cuerpo del documento -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection



