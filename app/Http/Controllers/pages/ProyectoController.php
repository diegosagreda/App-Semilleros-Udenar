<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    public function index()
    {
      
        $proyectos = Proyecto::paginate(5);
        return view('content.pages.proyectos.pages-proyectos', compact('proyectos'));
    }
    /**
     * Show the form for creating the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.pages.proyectos.pages-proyectos-create');
    }

    /**
     * Store the newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosProyecto = request()->except('_token');
        Proyecto::insert($datosProyecto);
        //return response()->json($datosProyecto);
        return redirect('/proyectos');
    }

    /**
     * Display the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        abort(404);
    }
}
