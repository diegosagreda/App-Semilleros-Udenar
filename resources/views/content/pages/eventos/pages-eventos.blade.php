@extends('layouts/layoutMaster')

@section('title', 'Eventos ')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/jquery-sticky/jquery-sticky.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
@endsection

@section('content')

<!-- Sticky Actions -->

<h4 class="py-3 breadcrumb-wrapper mb-4">
  <span class="text-muted fw-light">Gestión |</span> Eventos
</h4>

<!-- Header -->
<div class="d-flex justify-content-between">
  <a href="{{route('eventos.create')}}" class="btn btn-primary text-nowrap">
    <i class='bx bx-calendar text-info display-6'></i> Crear Evento
  </a>
</div>
<!--/ Header -->
<br>
<div class="row mb-4" id="sortable-cards">
  <div class="col-lg-3 col-md-6 col-sm-12">
    <div class="card drag-item cursor-move mb-lg-0 mb-4">
      <div class="card-body text-center">
        <h2>
          <i class="bx bx-calendar text-info display-6"></i>
        </h2>
        <h4>Eventos</h4>
        <h5>0</h5>
      </div>
    </div>
  </div>
  
<!-- /Sticky Actions -->

@endsection