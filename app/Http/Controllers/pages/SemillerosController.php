<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semillero;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


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

    try {
        if ($request->hasFile('logo')) {
            $ruta = public_path('assets/img_semilleros/');
            $fotoUsuario = date('YmdHis') . "." . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move($ruta, $fotoUsuario);
            $semillero->logo = $fotoUsuario;
        }

        if ($request->hasFile('arhivo_resolucion')) {
            $ruta = public_path('assets/docs_semilleros/');
            $documento = date('YmdHis') . "." . $request->file('arhivo_resolucion')->getClientOriginalExtension();
            $request->file('arhivo_resolucion')->move($ruta, $documento);
            $semillero->arhivo_resolucion = $documento;
        }
    } catch (\Throwable $th) {
        $errorMessage = $th->getMessage();
        // Manejo del error
    }

    $semillero->save();

    return redirect()->route('pages-semilleros');
}

public function destroy(Request $request)
{
    $semilleroId = $request->id;
    $semillero = Semillero::find($semilleroId);

    if ($semillero) {
        if ($semillero->logo) {
            $rutaLogo = public_path('assets/img_semilleros/') . $semillero->logo;
            if (File::exists($rutaLogo)) {
                File::delete($rutaLogo);
            }
        }
        if ($semillero->archivo_resolucion) {
            $rutaResolucion = public_path('assets/docs_semilleros/') . $semillero->archivo_resolucion;
            if (File::exists($rutaResolucion)) {
                File::delete($rutaResolucion);
            }
        }

        $semillero->delete();
    }

    return redirect()->route('pages-semilleros');
}


}
