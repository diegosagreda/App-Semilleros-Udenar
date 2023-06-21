@extends('layouts/layoutMaster')

@section('title', 'Detalles')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
@endsection

<!-- Page -->
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-profile.css')}}" />
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
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card bg-dark text-white">
                <div class="card-header">
                    <h2 class="text-primary">Detalles del Proyecto</h2>
                </div>
                <div class="card-body">
                    <h4 class="card-title" style="color: #ff9900;">{{ $proyecto->nomProyecto }}</h4>
                    <h6 class="card-title" style="color: #d19c4e;">Codigo: {{ $proyecto->codProyecto }}</h6>
                    <!-- <p class="card-text">{{ $proyecto->descripcion }}</p> -->
                    
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Estado:</strong> {{ $proyecto->estProyecto }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>Fecha de inicio:</strong> {{ $proyecto->fecha_inicioPro }}</p>
                            <p class="card-text"><strong>Fecha de fin:</strong> {{ $proyecto->fecha_finPro }}</p>
                        </div>
                    </div>
                    
                    <a href="{{ route('proyectos.edit', $proyecto->codProyecto) }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection