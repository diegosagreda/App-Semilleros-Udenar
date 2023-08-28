<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semillero;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;


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
  public function view(Semillero $semillero){
    return view('content.pages.semilleros.pages-semilleros-view', compact('semillero'));
  }
  public function store(Request $request)
{
    $semillero = new Semillero();
    // $semillero->fill($request->all());
    $semillero->nombre = $request->input('nombre');
    $semillero->correo = $request->input('correo');
    $semillero->sede= $request->input('sede');
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

        if ($request->hasFile('archivo_resolucion')) {
            $ruta = public_path('assets/docs_semilleros/');
            $documento = date('YmdHis') . "." . $request->file('archivo_resolucion')->getClientOriginalExtension();
            $request->file('archivo_resolucion')->move($ruta, $documento);
            $semillero->archivo_resolucion = $documento;
        }
    } catch (\Throwable $th) {
        $errorMessage = $th->getMessage();
        // Manejo del error
    }

    $semillero->save();

    // return redirect()->route('pages-semilleros');
    return response()->json([
      'success' => true,
      'message' => 'Los datos se han guardado exitosamente.',
      'coordinador_id' => $semillero->id,
    ]);
}
public function pdf(){
    $semilleros = Semillero::all();
    $pdf = Pdf::loadView('content.pages.semilleros.pages-semilleros-pdf', compact('semilleros'));
     return $pdf->stream();
  //return view('content.pages.proyectos.pages-proyectos-pdf');
}

public function edit($id){
  $semillero=Semillero::where('id',$id)->first();
  return view('content.pages.semilleros.pages-semilleros-edit', compact('semillero'));
}
public function update(Request $request, $id){
  $semillero=Semillero::where('id',$id)->first();
  $newLogo = "";
  $newDoc = "";
  if ($request->hasFile('logo')) {
    $ruta = public_path('assets/img_semilleros/');
    // Eliminar foto anterior si existe
    if ($semillero->logo) {
        $rutaFotoAnterior = $ruta . $semillero->logo;
        if (file_exists($rutaFotoAnterior)) {
            unlink($rutaFotoAnterior);
        }
    }

    $foto = $request->file('logo');
    $fotoUsuario = date('YmdHis') . "." . $foto->getClientOriginalExtension();
    $foto->move($ruta, $fotoUsuario);
    $newLogo = $fotoUsuario;

}else{
  $newLogo = $semillero->logo;
}
// Documento archivo de resolucion
if ($request->hasFile('archivo_resolucion')) {
  $ruta = public_path('assets/docs_semilleros/');

  if ($semillero->archivo_resolucion) {
    $rutaDocumentoAnterior = $ruta . $semillero->archivo_resolucion;
    if (file_exists($rutaDocumentoAnterior)) {
        unlink($rutaDocumentoAnterior);
    }
}

$documento = $request->file('archivo_resolucion');
$nombreDocumento = date('YmdHis') . "." . $documento->getClientOriginalExtension();
$documento->move($ruta, $nombreDocumento);
$newDoc = $nombreDocumento;

}else{
$newDoc = $semillero->archivo_resolucion;
}
$semillero->fill($request->all());
$semillero->logo = $newLogo;
$semillero->archivo_resolucion = $newDoc;
$semillero->save();

// return redirect()->route('pages-semilleros');
return response()->json([
  'success' => true,
  'message' => 'Los datos se han guardado exitosamente.',
  'coordinador_id' => $semillero->id,
]);
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
