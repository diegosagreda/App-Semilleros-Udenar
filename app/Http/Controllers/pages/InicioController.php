<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coordinador;
use App\Models\Semillero;
use App\Models\Semillerista;
use Illuminate\Support\Facades\Auth;




class InicioController extends Controller
{
  public function index()
  {
    //obtener el rol del usuario
    $role = Auth::user()->roles[0]->name;

    if($role === 'admin'){

      $semilleristas = Semillerista::all();
      $semilleros= Semillero::all();
      $coordinadores = Coordinador::All();
      return view('content.pages.pages-home',compact('coordinadores', 'semilleros', 'semilleristas'));

    }else if($role === 'coordinador'){
      $coordinador = Coordinador::where('user_id', Auth::id())->first();
      $semillero = $coordinador->semillero;

      $semilleristas = Semillerista::where('semillero_id',$semillero->id)->get();


      return view('content.pages.pages-home',compact('semilleristas','semillero'));
    }

  }
}
