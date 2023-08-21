@extends('layouts/layoutMaster')

@section('title', 'Detalles')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('proyecto/estilos/showblade.css') }}"-->
@endsection

<!-- Page -->
@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@endsection


@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/pages-profile.js') }}"></script>
@endsection


@section('content')
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    <div class="container mt-5">
        <h4 class="py-3 breadcrumb-wrapper mb-5">
            <span class="text-muted fw-light">Informacion /</span> Proyectos
        </h4>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0"><i class="fas fa-info-circle"></i> Detalles del Proyecto</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><i class="fas fa-file-alt"></i> <strong>Nombre del Proyecto:</strong></p>
                            <p>{{ $proyecto->nomProyecto }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-seedling"></i> <strong>Semillero Asociado:</strong></p>
                            @if ($proyecto->semillero)
                                <p>{{ $proyecto->semillero->nombre }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><i class="fas fa-code"></i> <strong>Código del Proyecto:</strong></p>
                            <p>{{ $proyecto->codProyecto }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-tag"></i> <strong>Tipo de Proyecto:</strong></p>
                            <p>{{ $proyecto->tipoProyecto }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><i class="fas fa-users"></i> <strong>Número de Integrantes:</strong></p>
                            <p>{{ $proyecto->numero_integrantes }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-flag"></i> <strong>Estado del Proyecto:</strong></p>
                            <p>{{ $proyecto->estProyecto }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><i class="fas fa-calendar-alt"></i> <strong>Fecha de Inicio:</strong></p>
                            <p>{{ $proyecto->fecha_inicioPro }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-calendar-alt"></i> <strong>Fecha de Fin:</strong></p>
                            <p>{{ $proyecto->fecha_finPro }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><i class="fas fa-user-friends "></i> <strong>Semilleristas Asignados:</strong></p>
                            <div class="overflow-x">
                                <div class="horizontal-friends-list">
                                    @foreach ($proyecto->semilleristas as $semillerista)
                                        <figure class="semillerista-figure">
                                            <picture>
                                                <img src="{{ asset('assets/img_semilleristas') . '/' . $semillerista->foto }}">
                                            </picture>
                                            <figcaption>
                                                <a href="{{ route('semilleristas.show', $semillerista->identificacion) }}" class="semillerista-link">{{ $semillerista->nombre }}</a>
                                            </figcaption>
                                        </figure>
                                    @endforeach
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-seedling"></i> <strong>Eventos Asociados:</strong></p>
                            <section class="overflow-x">
                                <div class="horizontal-friends-list">
                                    @forelse($proyecto->eventos as $evento)
                                        <figure>
                                            <picture>
                                                <img src="{{ asset('assets/eventos') . '/' . $evento->foto }}">
                                            </picture>
                                            <figcaption>
                                                <a href="{{ route('eventos.show', $evento->codigo) }}" class="semillerista-link">{{ $evento->nombre }}</a>
                                            </figcaption>
                                        </figure>
                                    @empty
                                        <p>No hay eventos.</p>
                                    @endforelse
                                </div>
                            </section>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 mt-3 text-right">
                            <a href="/proyectos" class="btn btn-danger"><i class="fas fa-times"></i> Cerrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <style>
        .overflow-x {
  overflow-x: auto;
  overscroll-behavior-x: contain;

  border: 1px solid hsl(0 0% 80%);
  border-radius: 1ex;
  background-color: var(--surface2);
  padding: 2rem;
}


.horizontal-friends-list {
  display: grid;
  grid-auto-flow: column;
  grid-auto-columns: 10ch;
  gap: 2rem;

  & > figure {
    display: grid;
    gap: 1ex;
    margin: 0;
    text-align: center;
    position: relative;
    cursor: pointer;
    user-select: none;
    transition: transform .2s ease-in-out;

    &:hover {
      transform: scale(1.1);
    }

    &:last-child::after {
      content: "";
      position: absolute;
      width: 2rem;
      height: 100%;
      right: -2rem;
      inline-size: 2rem;
      block-size: 100%;
      inset-end: -2rem;
    }

    & > picture {
      display: inline-block;
      inline-size: 10ch;
      block-size: 10ch;
      border-radius: 50%;

      background: 
        radial-gradient(hsl(0 0% 0% / 15%) 60%, transparent 0),
        radial-gradient(white 65%, transparent 0),
        linear-gradient(to top right, orange, deeppink);

      & > img {
        display: block;
        inline-size: 100%;
        block-size: 100%;
        object-fit: cover;
        clip-path: circle(42%);
      }
    }

    & > figcaption {
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
      font-weight: 500;
    }
  }
}
.semillerista-link {
    text-decoration: none;
    color: inherit;
    display: inline-block; /* Asegurarse de que el enlace ocupe el espacio solo necesario */
}

.semillerista-figure {
    display: grid;
    gap: 1ex;
    margin: 0;
    text-align: center;
    position: relative;
    cursor: pointer;
    user-select: none;
    transition: transform .2s ease-in-out;
}

.semillerista-link:hover .semillerista-figure {
    transform: scale(1.1);
}
    </style>
    <style>
        /* Estilos personalizados para esta página */
        .card-header h2 {
            margin: 0;
            /* Elimina el margen superior para el título */
        }
    
        .card-body p {
            font-size: 18px;
            margin-bottom: 10px;
            /* Ajusta el margen inferior */
        }
    
        .card-body ul {
            font-size: 18px;
            margin-bottom: 10px;
            /* Ajusta el margen inferior */
            padding-left: 20px;
        }
    
        .card-body i {
            margin-right: 10px;
        }
    
        .btn-danger {
            /* Ajusta los estilos del botón de cerrar */
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
    
    <!-- Agregar el GIF -->

    <!-- Agregar los scripts de Bootstrap y Font Awesome al final del cuerpo del documento -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



@endsection
