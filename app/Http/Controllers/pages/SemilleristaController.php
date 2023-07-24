<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semillerista;
use App\Models\Semillero;
use App\Models\Coordinador;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SemilleristaController extends Controller
{
    public function index(){
      //obtener el rol del usuario
      $role = Auth::user()->roles[0]->name;

      if($role === 'admin'){
        $semilleros = Semillero::All();
        $semilleristas = Semillerista::all();

        return view('content.pages.semilleristas.pages-semilleristas', compact('semilleristas','semilleros'));
      }else if($role === 'coordinador'){
        $coordinador = Coordinador::where('user_id', Auth::id())->first();
        $semillero = $coordinador->semillero;
        $semilleristas = Semillerista::where('semillero_id',$semillero->id)->get();
        $semilleros = [];

        return view('content.pages.semilleristas.pages-semilleristas', compact('semilleristas','semilleros','semillero'));
      }
    }
    public function create(){
      $semilleros = Semillero::all();
      return view('content.pages.semilleristas.pages-semilleristas-create', compact('semilleros'));
    }
    public function store(Request $request){
      $semillerista =new Semillerista();
      //Validamos el tipo de usuario que esta haciendo el registro de un semillerista
      $role = Auth::user()->roles[0]->name;
      if($role === 'coordinador'){
        $coordinador = Coordinador::where('user_id', Auth::id())->first();
        $semillerista->semillero_id = $coordinador->semillero->id;
      }

      $semillerista->fill($request->all());
      //Por defecto todos los semilleristas se registran en estado activo
      $semillerista->estado = 'activo';


      //De igual manera creamos usuario para el semillerista-----------------------
      $user = new User();
      $user->name = $semillerista->nombre;
      $user->email = $semillerista->correo;
      $user->password = password_hash($semillerista->identificacion, PASSWORD_DEFAULT);

      try {
        //Verificamos si existe un semillerista con la misma id
        if (Semillerista::where('identificacion', $semillerista->identificacion)->exists()) {
          return redirect()->back()->with('error','Ya existe un semillerista con la misma identificacion');
        } else {
          //Imagen
          if($foto = $request->file('foto')){
            $ruta = public_path('assets/img_semilleristas/');
            $fotoUsuario = date('YmdHis').".".$foto->getClientOriginalExtension();
            $foto->move($ruta, $fotoUsuario);
            $semillerista->foto = "$fotoUsuario";
          }
          //Reporte matricula
          if($reporte_matricula = $request->file('reporte_matricula')){
            $ruta = public_path('assets/docs_semilleristas/');
            $documento = $semillerista->identificacion.".".$reporte_matricula->getClientOriginalExtension();
            $reporte_matricula->move($ruta, $documento);
            $semillerista->reporte_matricula = "$documento";
          }

          $user->save();
          $semillerista->user_id = $user->id;
          $semillerista->fecha_vinculacion = date('Y-m-d');
          $semillerista->save();

          //Asiganar rol
          $role = Role::where('name','semillerista')->first();
          $user->assignRole($role);

          return response()->json([
            'success' => true,
            'message' => 'Los datos se han guardado exitosamente.',

          ]);
        }

      } catch (\Throwable $th) {
        $errorMessage = $th->getMessage();
        return redirect()->back()->with('error', $errorMessage);
      }
      //-----------------------------------------------------------------------------
    }

    public function show($identificacion) {
      $semillerista = Semillerista::where('identificacion', $identificacion)->first();
      return view('content.pages.semilleristas.pages-semilleristas-show', compact('semillerista'));
    }
    public function edit($identificacion){
      $semilleros = Semillero::all();
      $semillerista = Semillerista::where('identificacion', $identificacion)->first();
      return view('content.pages.semilleristas.pages-semilleristas-edit', compact('semillerista','semilleros'));
    }
    public function update(Request $request, $identificacion){
      $semillerista = Semillerista::where('identificacion',$identificacion)->firstOrFail();
      $newfoto = "";
      $newDoc = "";
      // Imagen
      if ($request->hasFile('foto')) {
          $ruta = public_path('assets/img_semilleristas/');

          // Eliminar foto anterior si existe
          if ($semillerista->foto) {
              $rutaFotoAnterior = $ruta . $semillerista->foto;
              if (file_exists($rutaFotoAnterior)) {
                  unlink($rutaFotoAnterior);
              }
          }

          $foto = $request->file('foto');
          $fotoUsuario = date('YmdHis') . "." . $foto->getClientOriginalExtension();
          $foto->move($ruta, $fotoUsuario);
          $newfoto = $fotoUsuario;

      }else{
        $newfoto = $semillerista->foto;
      }

      // Documento reporte matricula
      if ($request->hasFile('reporte_matricula')) {
          $ruta = public_path('assets/docs_semilleristas/');

          // Eliminar documento anterior si existe
          if ($semillerista->reporte_matricula) {
              $rutaDocumentoAnterior = $ruta . $semillerista->reporte_matricula;
              if (file_exists($rutaDocumentoAnterior)) {
                  unlink($rutaDocumentoAnterior);
              }
          }

          $documento = $request->file('reporte_matricula');
          $nombreDocumento = $semillerista->identificacion . "." . $documento->getClientOriginalExtension();
          $documento->move($ruta, $nombreDocumento);
          //$semillerista->reporte_matricula = $nombreDocumento;
          $newDoc = $nombreDocumento;
      }else{
        $newDoc = $semillerista->reporte_matricula;
      }

      $semillerista->fill($request->all());
      $semillerista->foto = $newfoto;
      $semillerista->reporte_matricula = $newDoc;

      $semillerista->save();
      return redirect()->route('pages-semilleristas');
    }
    public function changeState($identificacion){
      $semillerista = Semillerista::where('identificacion', $identificacion)->first();
      if($semillerista->estado === 'activo'){
        $semillerista->estado = 'inactivo';
      }else{
        $semillerista->estado = 'activo';
      }
      $semillerista->save();

      $role = Auth::user()->roles[0]->name;

      if($role === 'admin'){
        $semilleristas = Semillerista::all();
        $semilleros = Semillero::all();

        return view('content.pages.semilleristas.pages-semilleristas', compact('semilleristas','semilleros'));
      }else if($role === 'coordinador'){
        $coordinador = Coordinador::where('user_id', Auth::id())->first();
        $semillero = $coordinador->semillero;
        $semilleristas = Semillerista::where('semillero_id',$semillero->id)->get();
        $semilleros = [];

        return view('content.pages.semilleristas.pages-semilleristas', compact('semilleristas','semilleros','semillero'));
      }
    }
    public function filtrarPorSemillero(Request $request, $semillero){

      $semilleristas = Semillerista::where('semillero_id',$semillero)->get();
      $semilleros = Semillero::all();

      return view('content.pages.semilleristas.pages-semilleristas', compact('semilleristas','semilleros'));
    }

    public function destroy(Request $request, $identificacion){
      $semillerista = Semillerista::where('identificacion',$identificacion)->firstOrFail();
      $user = User::where('id',$semillerista->user_id)->firstOrFail();

      $user->delete();
      $semillerista->delete();

      /*Eliminamos imagen y documentos*/
      $rutaImg = public_path('assets/img_semilleristas/');
      $rutaDoc = public_path('assets/docs_semilleristas/');

      // Eliminar foto si existe
      if ($semillerista->foto) {
          $rutaFotoAnterior = $rutaImg . $semillerista->foto;
          if (file_exists($rutaFotoAnterior)) {
              unlink($rutaFotoAnterior);
          }
      }
      // Eliminar documento si existe
      if ($semillerista->reporte_matricula) {
        $rutaDocAnterior = $rutaDoc . $semillerista->reporte_matricula;
      if (file_exists($rutaDocAnterior)) {
        unlink($rutaDocAnterior);
      }

      return redirect()->route('pages-semilleristas');
    }





}}
