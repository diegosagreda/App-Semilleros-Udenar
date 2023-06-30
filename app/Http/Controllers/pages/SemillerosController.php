<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semillero;
use Illuminate\Support\Facades\Storage;


class SemillerosController extends Controller
{
  public function index()
  {
    $semilleros=Semillero::all();
    return view('content.pages.semilleros.pages-semilleros',compact('semilleros'));
  }

  public function create(){
    return view('content.pages.semilleros.pages-semilleros-create');
  }
  public function edit(){
    return view('content.pages.semilleros.pages-semilleros-edit');
  }
  public function view(){
    return view('content.pages.semilleros.pages-semilleros-view');
  }
  public function store(Request $request)
{
    $semillero = new Semillero();
    $semillero->nombre = $request->input('nombreSemillero');
    $semillero->correo = $request->input('correo');
    $semillero->descripcion = $request->input('descripcion');
    $semillero->mision = $request->input('mision');
    $semillero->vision = $request->input('vision');
    $semillero->valores = $request->input('valores');
    $semillero->objetivos = $request->input('objetivos');
    $semillero->lineas_investigacion = $request->input('lineas_investigacion');
    $semillero->presentacion = $request->input('presentacion');
    $semillero->fecha_creacion = now();
    $semillero->numero_resolucion = $request->input('numero_resolucion');

    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('semilleros');
        $semillero->logo = $logoPath;
    }

    if ($request->hasFile('arhivo_resolucion')) {
        $arhivoResolucionPath = $request->file('arhivo_resolucion')->store('semilleros');
        $semillero->arhivo_resolucion = $arhivoResolucionPath;
    }

    $semillero->save();

    return redirect()->route('pages-semilleros');
}
public function destroy(Request $request) {
  $semilleroId = $request->id;
  $semillero = Semillero::find($semilleroId);

  if ($semillero) {
      if ($semillero->logo) {
          Storage::delete($semillero->logo);
      }
      if ($semillero->arhivo_resolucion) {
          Storage::delete($semillero->arhivo_resolucion);
      }

      $semillero->delete();
  }

  return redirect()->route('pages-semilleros');
}


}
