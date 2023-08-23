<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages\CoordinadorController;
use App\Http\Controllers\pages\SemillerosController;
use App\Http\Controllers\pages\InicioController;
use App\Http\Controllers\pages\EventoController;
use App\Http\Controllers\pages\SemilleristaController;
use App\Http\Controllers\pages\ProyectoController;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    /*RUTA INICIO ------------------------------------------------------------------------------------------- */
    Route::get('/',[InicioController::class, 'index'])->name('pages-home');
    /*RUTAS SEMILLEROS -------------------------------------------------------------------------------------- */
    Route::get('/semilleros', [SemillerosController::class, 'index'])->name('pages-semilleros');
    Route::get('/semilleros/create', [SemillerosController::class, 'create'])->name('semilleros.create');
    Route::get('/semilleros/edit/{semillero}', [SemillerosController::class, 'edit'])->name('semilleros.edit');
    Route::put('/semilleros/update/{semillero}', [SemillerosController::class,'update'])->name('semilleros.update');
    Route::post('/semilleros/store', [SemillerosController::class, 'store'])->name('semilleros.store');
    Route::get('/semilleros/view/{semillero}', [SemillerosController::class, 'view'])->name('semilleros.view');
    Route::delete('/semilleros/destroy/{id}',[SemillerosController::class,'destroy'])->name('semilleros.destroy');
    /*RUTAS SEMILLERISTAS ------------------------------------------------------------------------------------*/
    Route::get('/semilleristas', [SemilleristaController::class, 'index'])->name('pages-semilleristas');
    Route::get('/semilleristas/create', [SemilleristaController::class, 'create'])->name('semilleristas.create');
    Route::post('/semilleritas/store', [SemilleristaController::class, 'store'])->name('semilleristas.store');
    Route::get('/semilleristas/show/{semillerista}',[SemilleristaController::class, 'show'])->name('semilleristas.show');
    Route::get('/semilleristas/edit/{semillerista}', [SemilleristaController::class, 'edit'])->name('semilleristas.edit');
    Route::put('/semilleristas/update/{semillerista}', [SemilleristaController::class,'update'])->name('semilleristas.update');
    Route::put('/semilleristas/updateState/{semillerista}', [SemilleristaController::class,'changeState'])->name('semilleristas.updateState');
    Route::delete('/semilleristas/destroy/{semillerista}',[SemilleristaController::class,'destroy'])->name('semilleristas.destroy');
    Route::get('/semilleristas/filtro/{semillero}', [SemilleristaController::class,'filtrarPorSemillero'])->name('semilleristas.filtro');




    /*RUTAS COORDINADORES ------------------------------------------------------------------------------------*/
    Route::get('/coordinadores', [CoordinadorController::class, 'index'])->name('pages-coordinadores');
    Route::get('/coordinadores/create', [CoordinadorController::class, 'create'])->name('coordinadores.create');
    Route::post('/coordinadores/store', [CoordinadorController::class, 'store'])->name('coordinadores.store');
    Route::get('/coordinadores/show/{coordinador}',[CoordinadorController::class, 'show'])->name('coordinadores.show');
    Route::get('/coordinadores/edit/{coordinador}', [CoordinadorController::class, 'edit'])->name('coordinadores.edit');
    Route::put('/coordinadores/update/{coordinador}', [CoordinadorController::class,'update'])->name('coordinadores.update');
    Route::delete('/coordinadores/destroy/{coordinador}',[CoordinadorController::class,'destroy'])->name('coordinadores.destroy');
      /**Validar id */
      Route::post('/coordinadores/validate/{coordinador}', [CoordinadorController::class, 'validar']);
    /**------------------------------------------------------------------------------------------------------------ */
    /*RUTAS EVENTOS--------------------------------------------------------------------------------*/
    Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
    Route::get('/eventos/create', [EventoController::class, 'create'])->name('eventos.create');
    Route::post('/eventos/store', [EventoController::class, 'store'])->name('eventos.store');
    Route::get('/eventos/show/{evento}', [EventoController::class, 'show'])->name('eventos.show');
    Route::get('/eventos/edit/{evento}', [EventoController::class, 'edit'])->name('eventos.edit');
    Route::delete('/evento/destroy/{evento}',[EventoController::class,'destroy'])->name('eventos.destroy');
    Route::put('/eventos/update/{evento}', [EventoController::class, 'update'])->name('eventos.update');
    Route::post('/eventos/proyecto/{evento}', [EventoController::class, 'registrarProyectos'])->name('eventos.proyecto');
    Route::delete('/eventos/proyecto/{evento}', [EventoController::class, 'eliminarProyecto'])->name('eventos.proyectos-eliminar');

   
    /*RUTAS PROYECTOS ----------------------------------------------------------------------*/
    //Route::get('/proyectos', [ProyectoController::class, 'index'])->name('pages-proyectos');
    Route::get('/proyectos/pdf', [ProyectoController::class, 'pdf'])->name('proyectos.pdf');
    Route::get('/proyectos/buscar', [ProyectoController::class, 'index'])->name('proyectos.buscar');
    Route::post('/proyectos/semilleritas/store/{codProyecto}', [ProyectoController::class, 'registrarSemilleristas'])->name('proyectos.semilleristas');
    Route::resource('/proyectos', ProyectoController::class);

    /*Ruta test elements template*/
    Route::get('/test', function (){
      return view('content.pages.testPlantilla.pages-test');
    });


});
