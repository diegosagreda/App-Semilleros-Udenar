<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coordinador;
use App\Models\Semillero;
use App\Models\Semillerista;
use App\Models\Proyecto;
use App\Models\Evento;
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
      $proyectos = Proyecto::All();
      $eventos = Evento::All();
      return view('content.pages.pages-home',compact('coordinadores', 'semilleros', 'semilleristas','proyectos', 'eventos'));

    }
    else if($role === 'coordinador'){
      $coordinador = Coordinador::where('user_id', Auth::id())->first();
      $semillero = $coordinador->semillero;

      $proyectos = Proyecto::where('semillero_id',$coordinador->semillero_id)->get();;
      $eventos = Evento::All();

      $semilleristas = Semillerista::where('semillero_id',$semillero->id)->get();


      return view('content.pages.pages-home',compact('semilleristas','semillero','proyectos', 'eventos'));
    }
    else if($role === 'semillerista'){
      $semillerista = Semillerista::where('user_id', Auth::id())->first();
      $semillero = $semillerista->semillero;

      $semilleristas = Semillerista::where('semillero_id',$semillero->id)->get();

      $proyectos = Proyecto::where('semillero_id',$semillerista->semillero_id)->get();;
      $eventos = Evento::All();
      



      return view('content.pages.pages-home',compact('semilleristas','semillero','proyectos', 'eventos'));
    }

  }
}
