@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Login')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
      <div class="flex-row text-center mx-auto">
        {{-- <img src="{{asset('assets/img/pages/login-'.$configData['style'].'.png')}}" alt="Auth Cover Bg color" width="520" class="img-fluid authentication-cover-img" data-app-light-img="pages/login-light.png" data-app-dark-img="pages/login-dark.png"> --}}
        <div class="mx-auto">
          <img src="https://www.udenar.edu.co/recursos/wp-content/uploads/2019/08/bloque-facing-1.jpg" alt="">
        </div>
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
        <div class="app-brand justify-content-center mb-4">
          <img style="width: 150px; padding-bottom: 30px" src="https://www.udenar.edu.co/recursos/wp-content/uploads/2021/09/logo-udenar-blanco.png" alt="">
        </div>
        <!-- /Logo -->
      

        @if (session('status'))
        <div class="alert alert-success mb-1 rounded-0" role="alert">
          <div class="alert-body">
            {{ session('status') }}
          </div>
        </div>
        @endif

        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
          <h2 class="mb-2">Iniciar Sesión</h2>
          @csrf
          <div class="mb-3">
            <label for="login-email" class="form-label">Usuario</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" placeholder="john@example.com" autofocus value="{{ old('email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="login-password">Contraseña</label>
              @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">
                <small>Olvidó su contraseña?</small>
              </a>
              @endif
            </div>
            <div class="input-group input-group-merge">
              <input type="password" id="login-password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember-me">
                Recordar usuario
              </label>
            </div>
          </div>
          <button class="btn btn-primary d-grid w-100" type="submit">Ingresar</button>
        </form>
       
      </div>
    </div>
    <!-- /Login -->
  </div>
</div>
@endsection