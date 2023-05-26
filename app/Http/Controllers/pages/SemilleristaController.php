<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SemilleristaController extends Controller
{
    public function index()
    {
      
      return view('content.pages.semilleristas.pages-semilleristas');
    }
    public function create()
    {
      
      return view('content.pages.semilleristas.pages-semilleristas-create');
    }
}
