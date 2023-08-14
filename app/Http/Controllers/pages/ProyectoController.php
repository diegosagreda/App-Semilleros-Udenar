<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Proyecto;
use App\Models\Semillero;
use App\Models\Semillerista;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Coordinador;


class ProyectoController extends Controller
{
    public function index(Request $request)
    {
      //obtener el rol del usuario
      $role = Auth::user()->roles[0]->name;
      if($role === 'admin'){

        $tipo = $request->get('tipoProyecto');
        $fecha = $request->get('fecha_inicioPro');
        $estado = $request->get('estProyecto');

        $proyectos = Proyecto::orderBy('estProyecto', 'DESC')
            ->tipo($tipo)
            ->fecha($fecha)
            ->estado($estado)
            ->paginate(20);

        return view('content.pages.proyectos.pages-proyectos', compact('proyectos','tipo','fecha','estado'));
      }else if($role === 'coordinador'){
        $coordinador = Coordinador::where('user_id', Auth::id())->first();
        $semillero = $coordinador->semillero;

        $tipo = $request->get('tipoProyecto');
        $fecha = $request->get('fecha_inicioPro');
        $estado = $request->get('estProyecto');

        $proyectos = Proyecto::where('semillero_id', $semillero->id)->orderBy('estProyecto', 'DESC')
            ->tipo($tipo)
            ->fecha($fecha)
            ->estado($estado)
            ->paginate(20);

        return view('content.pages.proyectos.pages-proyectos', compact('proyectos','tipo','fecha','estado'));

      }
    }
    /**
     * Show the form for creating the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semilleros = Semillero::all();
        $semilleristas = Semillerista::all();
        return view('content.pages.proyectos.pages-proyectos-create', compact('semilleros','semilleristas'));
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
            'numero_integrantes' => 'required|integer|min:1|max:5',

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
            'numero_integrantes.required' => 'Selecciona el numero de integrantes',
<<<<<<< HEAD
            'semillero_id.required'=>'Asegurate de que el semillero exista',
            'semillero_id.exists' => 'El semillero seleccionado no existe.',

=======


>>>>>>> main
        ];


        $this->validate($request, $campos,$mensaje);

        $datosProyecto = request()->except('_token','seleccionados');

<<<<<<< HEAD




=======
        $role = Auth::user()->roles[0]->name;
        if($role === 'coordinador'){
            $coordinador = Coordinador::where('user_id', Auth::id())->first();
            $request->merge(['semillero_id' => $coordinador->semillero_id]);
        }

>>>>>>> main
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

        //relacionar con semilleristas
        $proyecto = Proyecto::find($request->input('codProyecto'));
        $seleccionados = $request->input('seleccionados', []);
        foreach ($seleccionados as $seleccionado){
            $proyecto->semilleristas()->attach($seleccionado);
        }


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
        $semilleristas = Semillerista::all();
        $proyecto = Proyecto::find($id);
        return view('content.pages.proyectos.pages-proyectos-show', compact('proyecto','semilleristas'));
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

        if($request->hasFile('PropProyecto')){
            $campos=['PropProyecto'=>'required|file',];
            $mensaje=[ 'PropProyecto.required'=>'La propuesta del proyecto es requerida',];
        }

        if($request->hasFile('Proyecto_final')){
            $campos=['Proyecto_final'=>'required|file',];
            $mensaje=[ 'Proyecto_final.required'=>'El proyecto final es requerido',];
        }

            // Validar los campos que no son archivos
        $this->validate($request, $campos, $mensaje);

        // Obtener el proyecto existente

        // Almacenar el valor original del codProyecto
        $proyectoAntiguo = Proyecto::findOrFail($id);
        $codProyectoAntiguo = $proyectoAntiguo->codProyecto;

        // Si la validación es exitosa, actualizamos los campos del proyecto (excepto archivos)
        $datosProyecto = $request->except('_token', '_method');
         // Actualizar el proyecto en la base de datos
        Proyecto::where('codProyecto','=',$id)->update($datosProyecto);

        try {
            // Buscar el proyecto utilizando el nuevo valor actualizado del codProyecto
            $proyectoActualizado = Proyecto::where('codProyecto', '=', $datosProyecto['codProyecto'])->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            // Si no se encuentra el proyecto con el nuevo valor, redireccionar con un mensaje de error
            return redirect()->back()->with('error', 'No se pudo actualizar el proyecto. El proyecto anterior ya no existe.');
        }

        // Redireccionar a la página del proyecto actualizado con el nuevo valor de codProyecto
        return redirect('/proyectos/' . $datosProyecto['codProyecto'])->with('mensaje', 'Proyecto actualizado con éxito');

        //$proyecto = Proyecto::findOrFail($id);
        // Actualizar el proyecto en la base de datos
        //return redirect('/proyectos')->with('mensaje', 'Proyecto actualizado con éxito');
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

    public function registrarSemilleristas(Request $request, $codProyecto){
        $proyecto = Proyecto::find($codProyecto);
        $seleccionados = $request->input('seleccionados', []);
        foreach ($seleccionados as $seleccionado){
            $proyecto->semilleristas()->attach($seleccionado);
        }

        $semilleristas = Semillerista::all();
        return view('content.pages.proyectos.pages-proyectos-show', compact('proyecto','semilleristas'))->with('mensaje','Semillerista asignado con exito');
    }
}
