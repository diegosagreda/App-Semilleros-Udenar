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
        return view('content.pages.eventos.pages-eventos-create');
      }
    

    /**
     * Store the newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
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

    return view('content.pages.eventos.pages-eventos-show', compact('evento'));
}


    /**
     * Show the form for editing the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $evento = Evento::find($id);
        
        return view('content.pages.eventos.pages-eventos-edit',['evento' => $evento]);
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
            return redirect('/eventos')->with('success', 'Evento actualizado correctamente');
        } else {
            return redirect('/eventos')->with('error', 'Evento no encontrado');
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
    
        return redirect()->route('eventos.index')->with('success', 'El evento ha sido eliminado exitosamente');
    }

    
}
