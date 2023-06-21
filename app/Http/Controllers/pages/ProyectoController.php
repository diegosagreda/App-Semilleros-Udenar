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

        $campos=[
            'codProyecto'=>'required|integer',
            'nomProyecto'=>'required',
            'tipoProyecto'=>'required',
            'estProyecto'=>'required',
            'fecha_inicioPro'=>'required',
            'fecha_finPro'=>'required',
            'PropProyecto'=>'required|file',
            'Proyecto_final'=>'required|file',
            'semillero_id' => 'required|exists:semilleros,id',

        ];

        $mensaje=[
            'codProyecto.required'=>'El codigo del proyecto es requerido',
            'nomProyecto.required'=>'El nombre del proyecto es requerido',
            'tipoProyecto.required'=>'El tipo de proyecto es requerido',
            'estProyecto.required'=>'El estado del proyecto es requerido',
            'fecha_inicioPro.required'=>'La fecha de inicio del proyecto es requerida',
            'fecha_finPro.required'=>'La fecha de finalizacion del proyecto es requerida',
            'PropProyecto.required'=>'La propuesta del proyecto es requerida',
            'Proyecto_final.required'=>'El proyecto final es requerido',
            'semillero_id.required'=>'Asegurate de que el semillero exista',
            'semillero_id.exists' => 'El semillero seleccionado no existe.',
            
        ];

      
        $this->validate($request, $campos,$mensaje);

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
