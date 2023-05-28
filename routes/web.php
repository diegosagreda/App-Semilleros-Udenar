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
    Route::get('/semilleros/edit', [SemillerosController::class, 'edit'])->name('semilleros.edit');
    Route::get('/semilleros/view', [SemillerosController::class, 'view'])->name('semilleros.view');
    /*RUTAS SEMILLERISTAS ------------------------------------------------------------------------------------*/
    Route::get('/semilleristas', [SemilleristaController::class, 'index'])->name('pages-semilleristas');
    Route::get('/semilleristas/create', [SemilleristaController::class, 'create'])->name('semilleristas.create');
    Route::post('/semilleritas/store', [SemilleristaController::class, 'store'])->name('semilleristas.store');
    Route::get('/semilleristas/show/{coordinador}',[SemilleristaController::class, 'show'])->name('semilleristas.show');
    Route::get('/semilleristas/edit/{coordinador}', [SemilleristaController::class, 'edit'])->name('semilleristas.edit');
    Route::put('/semilleristas/update/{coordinador}', [SemilleristaController::class,'update'])->name('semilleristas.update');
    Route::delete('/semilleristas/destroy/{coordinador}',[SemilleristaController::class,'destroy'])->name('semilleristas.destroy');
    /*RUTAS COORDINADORES ------------------------------------------------------------------------------------*/
    Route::get('/coordinadores', [CoordinadorController::class, 'index'])->name('pages-coordinadores');
    Route::get('/coordinadores/create', [CoordinadorController::class, 'create'])->name('coordinadores.create');
    Route::post('/coordinadores/store', [CoordinadorController::class, 'store'])->name('coordinadores.store');
    Route::get('/coordinadores/show/{coordinador}',[CoordinadorController::class, 'show'])->name('coordinadores.show');
    Route::get('/coordinadores/edit/{coordinador}', [CoordinadorController::class, 'edit'])->name('coordinadores.edit');
    Route::put('/coordinadores/update/{coordinador}', [CoordinadorController::class,'update'])->name('coordinadores.update');
    Route::delete('/coordinadores/destroy/{coordinador}',[CoordinadorController::class,'destroy'])->name('coordinadores.destroy');
    /**------------------------------------------------------------------------------------------------------------ */
    /*RUTAS EVENTOS*/
    Route::get('/eventos', [EventoController::class, 'index'])->name('pages-eventos');
    /*RUTAS PROYECTOS */
    Route::get('/proyectos', [ProyectoController::class, 'index'])->name('pages-proyectos');

});
