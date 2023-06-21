<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semillero;


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
  public function store(Request $request){
    $semillero =new Semillero();

    $semillero =new Semillero();
    $semillero->nombre = $request->input('nombreSemillero');
    $semillero->correo = $request->input('correo');
    $semillero->logo = $request->input('logo');
    $semillero->descripcion = $request->input('descripcion');
    $semillero->mision = $request->input('mision');
    $semillero->vision = $request->input('vision');
    $semillero->valores = $request->input('valores');
    $semillero->objetivos = $request->input('objetivos');
    $semillero->lineas_investigacion = $request->input('lineas_investigacion');
    $semillero->presentacion = $request->input('presentacion');
    $semillero->fecha_creacion = now();
    $semillero->numero_resolucion = $request->input('numero_resolucion');
    $semillero->arhivo_resolucion = $request->input('arhivo_resolucion');

     if($logo= $request->file('logo')){
      $semillero->logo = $request->file('logo')->store('semilleros');
    }
    if($arhivo_resolucion= $request->file('arhivo_resolucion')){
      $semillero->arhivo_resolucion = $request->file('arhivo_resolucion')->store('semilleros.store');
    }
    $semillero->save();
    //return view('content.pages.semilleros.pages-semilleros');
    return redirect()->route('pages-semilleros');
  }
  public function destroy(Request $request) {
    $semillero= $request->id;
    Estudiantes::where('id', $semillero)->delete();
    return redirect()->route('pages-semilleros');
}

}
