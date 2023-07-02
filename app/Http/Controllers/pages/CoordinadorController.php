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
    $coordinadores = Coordinador::All();
    return view('content.pages.coordinadores.pages-coordinadores', compact('coordinadores'));
  }
  public function store(Request $request){

    $coordinador =new Coordinador();
    $coordinador->fill($request->all());
    //Imagen
    if($foto = $request->file('foto')){
      $ruta = public_path('assets/img_coordinadores/');
      $fotoUsuario = date('YmdHis').".".$foto->getClientOriginalExtension();
      $foto->move($ruta, $fotoUsuario);
      $coordinador->foto = "$fotoUsuario";
    }
     //Doc acuerdo nombramiento
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

    $user->save();
    $coordinador->user_id = $user->id;
    $coordinador->save();

    //Asiganar rol
    $role = Role::where('name','coordinador')->first();
    $user->assignRole($role);

    //-----------------------------------------------------------------------------
    return redirect()->route('pages-coordinadores');
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
  public function update(Request $request, $identificacion){
    $coordinador = Coordinador::where('identificacion',$identificacion)->firstOrFail();

    $coordinador->update($request->all());
    return redirect()->route('pages-coordinadores');
  }
  public function destroy(Request $request, $identificacion){
    $coordinador = Coordinador::where('identificacion',$identificacion)->firstOrFail();

    $coordinador->delete();
    return redirect()->route('pages-coordinadores');
  }
}
