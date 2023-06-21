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
    public function show($id)
    {
        //
        $proyecto = Proyecto::find($id);
        return view('content.pages.proyectos.pages-proyectos-show', compact('proyecto'));
    }

    /**
     * Show the form for editing the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proyecto = Proyecto::findOrfail($id);
        //return view('programas.edit',compact('programa'));
        return view('content.pages.proyectos.pages-proyectos-edit',compact('proyecto'));
    }

    /**
     * Update the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosProyecto = request()->except('_token','_method');
        Proyecto::where('codProyecto','=',$id)->update($datosProyecto);
        return redirect('/proyectos');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proyecto::destroy($id);
        return redirect('/proyectos');
    }
}
