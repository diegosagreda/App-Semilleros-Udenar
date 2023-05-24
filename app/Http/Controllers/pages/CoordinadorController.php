<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coordinador;
use App\Models\Semillero;


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
      $ruta = 'assets/profile';
      $fotoUsuario = date('YmdHis').".".$foto->getClientOriginalExtension();
      $foto->move($ruta, $fotoUsuario);
      $coordinador->foto = "$fotoUsuario";
    }
    //dd($coordinador);
    $coordinador->save();

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
