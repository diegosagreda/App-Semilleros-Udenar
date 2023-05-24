<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages\CoordinadorController;


$controller_path = 'App\Http\Controllers';


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    $controller_path = 'App\Http\Controllers';

    /*HOME --------------------------------------------------------------------------------------------------- */
    Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
    /*RUTAS SEMILLEROS -------------------------------------------------------------------------------------- */
    Route::get('/semilleros', $controller_path . '\pages\Semilleros@index')->name('pages-semilleros');
    /*RUTAS COORDINADORES ------------------------------------------------------------------------------------*/
    Route::get('/coordinadores', [CoordinadorController::class, 'index'])->name('pages-coordinadores');
    Route::get('/coordinadores/create', [CoordinadorController::class, 'create'])->name('coordinadores.create');
    
    Route::post('/coordinadores/store', [CoordinadorController::class, 'store'])->name('coordinadores.store');
    Route::get('/coordinadores/show/{coordinador}',[CoordinadorController::class, 'show'])->name('coordinadores.show');
    Route::get('/coordinadores/edit/{coordinador}', [CoordinadorController::class, 'edit'])->name('coordinadores.edit');
    Route::put('/coordinadores/update/{coordinador}', [CoordinadorController::class,'update'])->name('coordinadores.update');
    Route::delete('/coordinadores/destroy/{coordinador}',[CoordinadorController::class,'destroy'])->name('coordinadores.destroy');
    /**------------------------------------------------------------------------------------------------------------ */
});
