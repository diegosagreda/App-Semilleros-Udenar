<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semillerista;
use Spatie\Permission\Models\Role;
use App\Models\User;

class SemilleristaController extends Controller
{
    public function index()
    {
      $semilleristas = Semillerista::all();
      return view('content.pages.semilleristas.pages-semilleristas', compact('semilleristas'));
    }
    public function create()
    {
      return view('content.pages.semilleristas.pages-semilleristas-create');
    }
    public function store(Request $request){
      $semillerista =new Semillerista();
      $semillerista->fill($request->all());
      //Por defecto todos los semilleristas se registran en estado activo
      $semillerista->estado = 'activo';
      //Imagen
      if($foto = $request->file('foto')){
        $ruta = 'assets/profile';
        $fotoUsuario = date('YmdHis').".".$foto->getClientOriginalExtension();
        $foto->move($ruta, $fotoUsuario);
        $semillerista->foto = "$fotoUsuario";
      }

      //De igual manera creamos usuario para el semillerista-----------------------
      $user = new User();
      $user->name = $semillerista->nombre;
      $user->email = $semillerista->correo;
      $user->password = password_hash($semillerista->identificacion, PASSWORD_DEFAULT);

      $user->save();
      $semillerista->user_id = $user->id;
      $semillerista->save();

      //Asiganar rol
      $role = Role::where('name','semillerista')->first();
      $user->assignRole($role);

      //-----------------------------------------------------------------------------
      return redirect()->route('pages-semilleristas');
    }

    public function show($identificacion) {
      $semillerista = Semillerista::where('identificacion', $identificacion)->first();
      return view('content.pages.semilleristas.pages-semilleristas-show', compact('semillerista'));
    }
    public function edit($identificacion){
      $semillerista = Semillerista::where('identificacion', $identificacion)->first();
      return view('content.pages.semilleristas.pages-semilleristas-edit', compact('semillerista'));
    }
    public function update(Request $request, $identificacion){
      $semillerista = Semillerista::where('identificacion',$identificacion)->firstOrFail();

      $semillerista->update($request->all());
      return redirect()->route('pages-semilleristas');
    }
    public function destroy(Request $request, $identificacion){
      $semillerista = Semillerista::where('identificacion',$identificacion)->firstOrFail();
      $user = User::where('id',$semillerista->user_id)->firstOrFail();

      $user->delete();
      $semillerista->delete();
      return redirect()->route('pages-semilleristas');
    }

}
