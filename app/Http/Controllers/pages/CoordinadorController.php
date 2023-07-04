<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Coordinador;
use App\Models\Semillero;
use Spatie\Permission\Models\Role;




class CoordinadorController extends Controller
{
  public function index()
  {
    $semilleros = Semillero::All();
    $coordinadores = Coordinador::All();
    return view('content.pages.coordinadores.pages-coordinadores', compact('coordinadores', 'semilleros'));
  }
  public function store(Request $request){
    $coordinador =new Coordinador();
    $coordinador->fill($request->all());
    //Imagennn
    if($foto = $request->file('foto')){
      $ruta = public_path('assets/img_coordinadores/');
      $fotoUsuario = date('YmdHis').".".$foto->getClientOriginalExtension();
      $foto->move($ruta, $fotoUsuario);
      $coordinador->foto = "$fotoUsuario";
    }
     //Doc acuerdo nombramiento-1
     if($acuerdo_nombramiento = $request->file('acuerdo_nombramiento')){
      $ruta = public_path('assets/docs_coordinadores/');
      $documento = $coordinador->identificacion.".".$acuerdo_nombramiento->getClientOriginalExtension();
      $acuerdo_nombramiento->move($ruta, $documento);
      $coordinador->acuerdo_nombramiento = "$documento";
    }

    //De igual manera creamos usuario para el coordinador-----------------------
    $user = new User();
    $user->name = $coordinador->nombre;
    $user->email = $coordinador->correo;
    $user->password = password_hash($coordinador->identificacion, PASSWORD_DEFAULT);

    try {
      //Verificamos si existe un coordinador con la misma id
      if (Coordinador::where('identificacion', $coordinador->identificacion)->exists()) {
        return redirect()->back()->with('error','Ya existe un coordinador con la misma identificacion');
      } else {
          $user->save();
          $coordinador->user_id = $user->id;
          $coordinador->fecha_vinculacion = date('Y-m-d');
          $coordinador->save();

          //Asiganar rol
          $role = Role::where('name','coordinador')->first();
          $user->assignRole($role);
          return redirect()->route('pages-coordinadores');
      }

    } catch (\Throwable $th) {
      $errorMessage = $th->getMessage();
      return redirect()->back()->with('error', $errorMessage);
    }

    //-----------------------------------------------------------------------------
  }
  public function create(){
    $semilleros = Semillero::all();
    return view('content.pages.coordinadores.pages-coordinadores-create', compact('semilleros'));
  }
  public function show(Coordinador $coordinador) {
    return view('content.pages.coordinadores.pages-coordinadores-show', compact('coordinador'));
  }
  public function edit($identificacion){
    $coordinador = Coordinador::where('identificacion', $identificacion)->first();
    return view('content.pages.coordinadores.pages-coordinadores-edit', compact('coordinador'));
  }
  public function update(Request $request, $identificacion)
{
    $coordinador = Coordinador::where('identificacion', $identificacion)->firstOrFail();
    $newfoto = "";
    $newDoc = "";
    // Imagen
    if ($request->hasFile('foto')) {
        $ruta = public_path('assets/img_coordinadores/');

        // Eliminar foto anterior si existe
        if ($coordinador->foto) {
            $rutaFotoAnterior = $ruta . $coordinador->foto;
            if (file_exists($rutaFotoAnterior)) {
                unlink($rutaFotoAnterior);
            }
        }

        $foto = $request->file('foto');
        $fotoUsuario = date('YmdHis') . "." . $foto->getClientOriginalExtension();
        $foto->move($ruta, $fotoUsuario);
        $newfoto = $fotoUsuario;
        //$coordinador->foto = $fotoUsuario;

    }else{
      $newfoto = $coordinador->foto;
    }

    // Documento acuerdo nombramiento
    if ($request->hasFile('acuerdo_nombramiento')) {
        $ruta = public_path('assets/docs_coordinadores/');

        // Eliminar documento anterior si existe
        if ($coordinador->acuerdo_nombramiento) {
            $rutaDocumentoAnterior = $ruta . $coordinador->acuerdo_nombramiento;
            if (file_exists($rutaDocumentoAnterior)) {
                unlink($rutaDocumentoAnterior);
            }
        }

        $documento = $request->file('acuerdo_nombramiento');
        $nombreDocumento = $coordinador->identificacion . "." . $documento->getClientOriginalExtension();
        $documento->move($ruta, $nombreDocumento);
        //$coordinador->acuerdo_nombramiento = $nombreDocumento;
        $newDoc = $nombreDocumento;
    }else{
      $newDoc = $coordinador->acuerdo_nombramiento;
    }


    $coordinador->fill($request->all());
    $coordinador->foto = $newfoto;
    $coordinador->acuerdo_nombramiento = $newDoc;

    $coordinador->save();

    return redirect()->route('pages-coordinadores');
}

  public function destroy(Request $request, $identificacion){
    $coordinador = Coordinador::where('identificacion',$identificacion)->firstOrFail();
    $user = User::where('id',$coordinador->user_id)->firstOrFail();

    $user->delete();
    $coordinador->delete();
    return redirect()->route('pages-coordinadores');
  }

  public function validar(Request $request, $identificacion){
    dd($identificacion);
    return response()->json(['response'=>true], 200);
  }
}
