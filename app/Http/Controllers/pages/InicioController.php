<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coordinador;
use App\Models\Semillero;
use App\Models\Semillerista;



class InicioController extends Controller
{
  public function index()
  {
    $semilleristas = Semillerista::all();
    $semilleros= Semillero::all();
    $coordinadores = Coordinador::All();
    return view('content.pages.pages-home',compact('coordinadores', 'semilleros', 'semilleristas'));
  }
}
