<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Proyecto;
use Dompdf\Options;
use Dompdf\Dompdf;
use PDF;

class EventoController extends Controller
{
    public function index(Request $request)
    
    {
        $eventos = Evento::all(); // Obtener todos los eventos
        $search = $request->input('search'); // Obtener el término de búsqueda desde la URL

    // Realizar la búsqueda de eventos según el término de búsqueda
        $eventos = Evento::where('nombre', 'LIKE', '%' . $search . '%')
                    ->orWhere('descripcion', 'LIKE', '%' . $search . '%')
                    ->orWhere('tipo', 'LIKE', '%' . $search . '%')
                    ->paginate(10); // Cambia el número según tus necesidades

       

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
    $validatedData = $request->validate([
        'codigo' => 'required|unique:eventos', // Agregamos la regla unique
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
        return redirect('/eventos')->with('mensaje', 'Evento creado exitosamente.');
        }
    /**
     * Display the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $evento = Evento::find($id); 
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

        if ($request->hasFile('foto')) {
            // Eliminamos la imagen anterior si existe
            if ($evento->foto && file_exists(public_path('assets/eventos/' . $evento->foto))) {
                unlink(public_path('assets/eventos/' . $evento->foto));
            }
        
            $foto = $request->file('foto');
            $fotoNombre = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('assets/eventos'), $fotoNombre);
            $evento->foto = $fotoNombre;
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
    $eventocompleto = Evento::find($proyecto);
    // Elimina los proyectos seleccionados de la tabla 'proyectos'
    //Proyecto::whereIn('id', $seleccionados)->delete();
    if ($eventocompleto !== null) {
        $eventocompleto->proyectos()->detach($evento);
    } else {
        // Manejo de errores, como mostrar un mensaje o registrar el problema
    }


   return redirect()->route('eventos.show', ['evento' => $eventocompleto]);

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

    public function generarReporte(Evento $evento)
    {
        $data = [
            'evento' => $evento,
            'proyecto' => $evento->proyecto 
            // Add other data you want to show in the PDF
        ];
    
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
    
        $pdf = new Dompdf($options);
        $pdf->loadHtml(view('content.pages.eventos.pages-eventos-reportes', $data)->render()); // Create a view named 'generar-reporte.blade.php' to customize the PDF layout
        $pdf->setPaper('A4', 'portrait'); // Set paper size and orientation
    
        $pdf->render();
    
        return $pdf->stream('reporte_evento.pdf'); 
    }

   
}
