<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SemillerosController extends Controller
{
  public function index()
  {
    return view('content.pages.semilleros.pages-semilleros');
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
}
