<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
      
      return view('content.pages.eventos.pages-eventos');
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
    $evento = new Evento();
    $evento->fill($request->all());

    // Guardar la imagen
    if ($foto = $request->file('foto')) {
        $ruta = 'ruta/donde/guardar/la/imagen';
        $nombreFoto = date('YmdHis') . "." . $foto->getClientOriginalExtension();
        $foto->move($ruta, $nombreFoto);
        $evento->foto = $nombreFoto;
    }

    $evento->save();

    return redirect()->route('pages-eventos');
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
