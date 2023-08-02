<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Proyecto;
use App\Models\Semillero;


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
        $semilleros = Semillero::all();
        return view('content.pages.proyectos.pages-proyectos-create', compact('semilleros'));
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
            'codProyecto' => 'required|integer|unique:proyectos', // Agregamos la regla 'unique' para asegurar que no haya duplicados
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
            'codProyecto.integer' => 'El codigo del proyecto debe ser un número entero',
            'codProyecto.unique' => 'El codigo del proyecto ya existe, debe ser único',
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


        
        if ($request->hasFile('PropProyecto')) {
            $archivoPropProyecto = $request->file('PropProyecto');
            $nombreArchivoOriginalPropProyecto = $archivoPropProyecto->getClientOriginalName();
            $rutaArchivoPropProyecto = $archivoPropProyecto->store('propuesta', 'public');
    
            $datosProyecto['PropProyecto'] = $rutaArchivoPropProyecto; // Guardar el nombre único en la base de datos
            $datosProyecto['nombre_archivo_original_propuesta'] = $nombreArchivoOriginalPropProyecto; // Guardar el nombre original en la base de datos
        }
    
        if ($request->hasFile('Proyecto_final')) {
            $archivoProyectoFinal = $request->file('Proyecto_final');
            $nombreArchivoOriginalProyectoFinal = $archivoProyectoFinal->getClientOriginalName();
            $rutaArchivoProyectoFinal = $archivoProyectoFinal->store('proyectoFinal', 'public');
    
            $datosProyecto['Proyecto_final'] = $rutaArchivoProyectoFinal; // Guardar el nombre único en la base de datos
            $datosProyecto['nombre_archivo_original_proyecto_final'] = $nombreArchivoOriginalProyectoFinal; // Guardar el nombre original en la base de datos
        }


        Proyecto::insert($datosProyecto);
        //return response()->json($datosProyecto);
        return redirect('/proyectos')->with('mensaje','Proyecto agregado con exito');
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
        $semilleros = Semillero::all();

        
        //return view('programas.edit',compact('programa'));
        return view('content.pages.proyectos.pages-proyectos-edit',compact('proyecto','semilleros'));
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

        $campos=[
            'codProyecto'=>'required|integer',
            'nomProyecto'=>'required',
            'tipoProyecto'=>'required',
            'estProyecto'=>'required',
            'fecha_inicioPro'=>'required',
            'fecha_finPro'=>'required',
            'semillero_id' => 'required|exists:semilleros,id',

        ];

        $mensaje=[
            'codProyecto.required'=>'El codigo del proyecto es requerido',
            'nomProyecto.required'=>'El nombre del proyecto es requerido',
            'tipoProyecto.required'=>'El tipo de proyecto es requerido',
            'estProyecto.required'=>'El estado del proyecto es requerido',
            'fecha_inicioPro.required'=>'La fecha de inicio del proyecto es requerida',
            'fecha_finPro.required'=>'La fecha de finalizacion del proyecto es requerida',
            'semillero_id.required'=>'Asegurate de que el semillero exista',
            'semillero_id.exists' => 'El semillero seleccionado no existe.',
            
        ];

      
            // Validar los campos que no son archivos
        $this->validate($request, $campos, $mensaje);

        // Obtener el proyecto existente
        $proyecto = Proyecto::findOrFail($id);

        // Si la validación es exitosa, actualizamos los campos del proyecto (excepto archivos)
        $datosProyecto = $request->except('_token', '_method', 'PropProyecto', 'Proyecto_final');

        // Procesar y guardar el archivo "PropProyecto" si se proporciona
        if ($request->hasFile('PropProyecto')) {
            // Eliminar el archivo actual si existe
            if ($proyecto->PropProyecto) {
                Storage::delete('public/' . $proyecto->PropProyecto);
            }
            // Procesar y guardar el nuevo archivo
            $datosProyecto['PropProyecto'] = $request->file('PropProyecto')->store('propuesta', 'public');
        }

        // Procesar y guardar el archivo "Proyecto_final" si se proporciona
        if ($request->hasFile('Proyecto_final')) {
            // Eliminar el archivo actual si existe
            if ($proyecto->Proyecto_final) {
                Storage::delete('public/' . $proyecto->Proyecto_final);
            }
            // Procesar y guardar el nuevo archivo
            $datosProyecto['Proyecto_final'] = $request->file('Proyecto_final')->store('proyectoFinal', 'public');
        }

        // Actualizar el proyecto en la base de datos
        $proyecto->update($datosProyecto);

        return redirect('/proyectos')->with('mensaje', 'Proyecto actualizado con éxito');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $proyecto=Proyecto::findOrFail($id);
        if(Storage::delete('public/'.$proyecto->PropProyecto)){
            Proyecto::destroy($id);
        }
        if(Storage::delete('public/'.$proyecto->Proyecto_final)){
            Proyecto::destroy($id);
        }
        Proyecto::destroy($id);
        return redirect('/proyectos')->with('mensaje','Proyecto eliminado con exito');
    }
}
