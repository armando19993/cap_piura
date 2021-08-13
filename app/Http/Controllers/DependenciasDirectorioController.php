<?php

namespace App\Http\Controllers;

use App\Models\DependenciasDirectorio;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;

class DependenciasDirectorioController extends Controller
{

    public function index()
    {
        if(Auth::user() == ""){
            return redirect('/');
        }
        $dependincias = DependenciasDirectorio::all();

        return view('dependencias', ['dependencias' => $dependincias]);
    }


    public function store(Request $request)
    {
        $depen = new DependenciasDirectorio();
        $depen->dependencia = $request->dependencia;
        $depen->save();

        Session::flash('message','Dependencia Creada con Exito!');
        return Redirect::to('/dependencias');
    }


    public function update(Request $request)
    {
        $depen = DependenciasDirectorio::find($request->id);
        $depen->dependencia = $request->dependencia;
        $depen->save();

        Session::flash('message','Dependencia Actualizada con Exito!');
        return Redirect::to('/dependencias');
    }


    public function destroy(DependenciasDirectorio $dependenciasDirectorio)
    {
        $dependenciasDirectorio->delete();

        Session::flash('message','Dependencia Eliminada con Exito!');
        return Redirect::to('/dependencias');
    }


    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////API/////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////


    public function indexApi()
    {
        $dependincias = DependenciasDirectorio::with('usuarios')->get();

        return response()->json([
          'dependencias' => $dependincias
        ]);
    }

}
