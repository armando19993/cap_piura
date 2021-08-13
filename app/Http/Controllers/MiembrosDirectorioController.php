<?php

namespace App\Http\Controllers;

use App\Models\MiembrosDirectorio;
use App\Models\DependenciasDirectorio;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;

class MiembrosDirectorioController extends Controller
{

    public function index()
    {
        if(Auth::user() == ""){
            return redirect('/');
        }
        $miembros = MiembrosDirectorio::with('dependencia')->get();

        return view('miembrosDependencias', ['miembros' => $miembros]);
    }

    public function create()
    {
        $dependencias = DependenciasDirectorio::all();

        return view('createMiembro', ['dependencias' => $dependencias]);
    }


    public function store(Request $request)
    {
        $miembro = new MiembrosDirectorio();
        $miembro->foto = $this->upload_global($request->file('image'), 'fotos');
        $miembro->cargo = $request->cargo;
        $miembro->nombre = $request->nombre;
        $miembro->telefono = $request->telefono;
        $miembro->correo = $request->correo;
        $miembro->dependencia_id = $request->dependencia;
        $miembro->save();

        Session::flash('message','Miembro Creado con Exito!');
        return Redirect::to('/miembrosDirectorio');
    }


    public function show(MiembrosDirectorio $miembrosDirectorio)
    {
      $dependencias = DependenciasDirectorio::all();

      return view('verMiembro', ['miembro' => $miembrosDirectorio, 'dependencias' => $dependencias]);
    }


    public function edit(MiembrosDirectorio $miembrosDirectorio)
    {
        $dependencias = DependenciasDirectorio::all();

        return view('editMiembro', ['miembro' => $miembrosDirectorio, 'dependencias' => $dependencias]);
    }


    public function update(Request $request, MiembrosDirectorio $miembrosDirectorio)
    {
      if($request->file('image') == ""){}
      else{
        $miembrosDirectorio->foto = $this->upload_global($request->file('image'), 'fotos');
      }
      $miembrosDirectorio->cargo = $request->cargo;
      $miembrosDirectorio->nombre = $request->nombre;
      $miembrosDirectorio->telefono = $request->telefono;
      $miembrosDirectorio->correo = $request->correo;
      $miembrosDirectorio->dependencia_id = $request->dependencia;
      $miembrosDirectorio->save();

      Session::flash('message','Miembro Editado con Exito!');
      return Redirect::to('/miembrosDirectorio');
    }


    public function destroy(MiembrosDirectorio $miembrosDirectorio)
    {
        $miembrosDirectorio->delete();

        Session::flash('message','Miembro Eliminado con Exito!');
        return Redirect::to('/miembrosDirectorio');
    }

    function upload_global($file, $folder){

    $file_type = $file->getClientOriginalExtension();
    $folder = $folder;
    $destinationPath = public_path() . '/uploads/'.$folder;
    $destinationPathThumb = public_path() . '/uploads/'.$folder.'thumb';
    $filename = uniqid().'_'.time() . '.' . $file->getClientOriginalExtension();
    $url = '/uploads/'.$folder.'/'.$filename;

    if ($file->move($destinationPath.'/' , $filename)) {
        return $filename;
    }
  }

  ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////API/////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////

    public function indexApi()
    {
        $miembros = MiembrosDirectorio::all();

        return response()->json([
          "miembros" => $miembros
        ]);
    }
}
