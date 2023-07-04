@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Incio')

@section('content')

@section('title', 'Cards Statistics- UI elements')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/cards-statistics.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Administración/</span> General
</h4>

<div class="row">
  @role('admin')
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-info"><i class='bx bx-shield fs-4'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Semilleros</span>
        <h2 class="mb-0">
          {{count($semilleros)}}
        </h2>
      </div>
      <a href="{{route('pages-semilleros')}}" class="btn btn-label-primary" href="">
        <strong>Ver</strong>
      </a>
    </div>
  </div>
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-danger"><i class='bx bx-group fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Coordinadores</span>
        <h2 class="mb-0">
          {{count($coordinadores)}}
        </h2>
      </div>
      <a href="{{route('pages-coordinadores')}}" class="btn btn-label-danger" href="">  <strong>Ver</strong></a>
    </div>
  </div>
  @endrole

  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-warning"><i class='bx bx-group fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Semilleristas</span>
        <h2 class="mb-0">
          {{count($semilleristas)}}
        </h2>
      </div>
      <a href="{{route('pages-semilleristas')}}" class="btn btn-label-warning" href="">  <strong>Ver</strong></a>
    </div>
  </div>

  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-primary"><i class='bx bx-cube fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Proyectos</span>
        <h2 class="mb-0">72</h2>
      </div>
      <a class="btn btn-label-info" href="">  <strong>Ver</strong></a>
    </div>
  </div>
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle bg-label-success"><i class='bx bx-purchase-tag fs-3'></i></span>
        </div>
        <span class="d-block mb-1 text-nowrap">Eventos</span>
        <h2 class="mb-0">65</h2>
      </div>
      <a class="btn btn-label-success" href="">  <strong>Ver</strong></a>
    </div>
  </div>

</div>


@endsection

@endsection
