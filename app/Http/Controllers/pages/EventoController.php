<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Proyecto;

class EventoController extends Controller
{
    public function index()
    {

        $eventos = Evento::all(); // Obtener todos los eventos

        return view('content.pages.eventos.pages-eventos', compact('eventos'));
    }
    /**
     * Show the form for creating the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $proyectos = Proyecto::all();
        return view('content.pages.eventos.pages-eventos-create') ->with('mensaje','El evento a sido creado con exito');;
      }


    /**
     * Store the newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    //dd(request)
   // Validar los datos del formulario
   $validatedData = $request->validate([
    // Agrega aquí las reglas de validación para cada campo del formulario
    'codigo' => 'required',
    'nombre' => 'required',
    'descripcion' => 'required',
    'tipo' => 'required',
    'modalidad' => 'required',
    'clasificacion' => 'required',
    'lugar' => 'required',
    'fecha_inicio' => 'required',
    'fecha_fin' => 'required',
    'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    'observaciones' => 'nullable',
]);

        // Guardar el evento en la base de datos
        $evento = new Evento();
        $evento->codigo = $request->codigo;
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->tipo = $request->tipo;
        $evento->modalidad = $request->modalidad;
        $evento->clasificacion = $request->clasificacion;
        $evento->lugar = $request->lugar;
        $evento->fecha_inicio = $request->fecha_inicio;
        $evento->fecha_fin = $request->fecha_fin;
        $evento->observaciones = $request->observaciones;

        // Procesar y almacenar la imagen del evento
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNombre = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('assets/eventos'), $fotoNombre);
            $evento->foto = $fotoNombre;
        }

        $evento->save();

        // Mostrar los datos del evento en la página
        //dd($evento);
        return redirect('/eventos');
        }
    /**
     * Display the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $evento = Evento::find($id); // Obtener el evento por su ID
    $proyectos=Proyecto::all();
    return view('content.pages.eventos.pages-eventos-show', compact('evento', 'proyectos'))->with('mensaje','Proyecto agregado con exito');
}


    /**
     * Show the form for editing the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $evento = Evento::find($id);

        return view('content.pages.eventos.pages-eventos-edit',['evento' => $evento])  ->with('mensaje','El evento ha sido actualizado con exito');
      }
    /**
     * Update the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos_evento = $request->except('_token', '_method');
        $evento = Evento::find($id);

        if ($evento) {
            $evento->update($datos_evento);
            return redirect('/eventos')->with('mensaje','El evento ha sido actualizado con exito');
        } else {
            return redirect('/eventos')->with('mensaje','Error');
        }
    }


    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();

        return redirect()->route('eventos.index')->with('mensaje','El evento ha sido eliminado');
    }
    public function registrarProyectos(Request $request, $evento)
    {
        $evento = Evento::find($evento);
        $seleccionados = $request->input('seleccionados', []);
        foreach ($seleccionados as $seleccionado) {
            $evento->proyectos()->attach($seleccionado);

        }
        $proyectos=Proyecto::all();
        return redirect()->route('eventos.show', ['evento' => $evento]);

    }

    public function eliminarProyecto(Request $request, $proyecto,$evento)
{

    // Obtén los IDs de los proyectos seleccionados desde el formulario
    $evento = Evento::find($evento);
    $seleccionados = $request->input('seleccionados', []);

    // Elimina los proyectos seleccionados de la tabla 'proyectos'
    //Proyecto::whereIn('id', $seleccionados)->delete();
    $evento->proyectos()->detach($proyecto);

    // Recarga los proyectos después de la eliminación
    $proyectos = Proyecto::all();

   // return view('content.pages.eventos.pages-eventos-show', compact('evento', 'proyectos'));
   return redirect()->route('eventos.show', ['evento' => $evento]);

}
//     public function eliminarProyecto(Request $request, $evento)
// {
//     // Encuentra el evento por su ID
//     $evento= Evento::find($evento);

//     if (!$evento) {
//         return redirect()->back()->with('error', 'El evento no existe.');
//     }

//     $seleccionados = $request->input('seleccionados', []);

//     // Desvincula los proyectos seleccionados del evento
//     $evento->proyectos()->detach($seleccionados);

//     $evento->delete();

//     return redirect()->route('eventos.show', ['evento' => $evento])->with('success', 'El evento ha sido eliminado exitosamente');

// }


    // ... otros métodos del controlador ...


}
