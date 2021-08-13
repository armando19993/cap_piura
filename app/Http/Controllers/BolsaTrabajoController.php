<?php

namespace App\Http\Controllers;

use App\Models\BolsaTrabajo;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;

class BolsaTrabajoController extends Controller
{

    public function index()
    {
        if(Auth::user() == ""){
            return redirect('/');
        }

        $bolsaTrabajo = BolsaTrabajo::all();

        return view('bolsas.bolsa', ['bolsas' => $bolsaTrabajo]);
    }

    public function create()
    {
        return view('bolsas.createTrabajo');
    }

    public function store(Request $request)
    {
        $bolsaTrabajo = new BolsaTrabajo();
        $bolsaTrabajo->titulo = $request->trabajo;
        $bolsaTrabajo->fecha = $request->fecha;
        $bolsaTrabajo->descripcion = $request->descripcion;
        $bolsaTrabajo->estado = 1;
        $bolsaTrabajo->save();

        Session::flash('message','Trabajo Registrado con Exito!');
        return Redirect::to('/bolsas');
    }


    public function show(BolsaTrabajo $bolsaTrabajo)
    {
        return view('bolsas.verTrabajo', ['bolsa' => $bolsaTrabajo]);
    }

    public function edit(BolsaTrabajo $bolsaTrabajo)
    {
        return view('bolsas.editTrabajo', ['bolsa' => $bolsaTrabajo]);
    }


    public function update(Request $request, BolsaTrabajo $bolsaTrabajo)
    {
      $bolsaTrabajo->titulo = $request->trabajo;

      $bolsaTrabajo->descripcion = $request->descripcion;
      $bolsaTrabajo->estado = 1;

      if($request->fecha != null){
        $bolsaTrabajo->fecha = $request->fecha;
      }
      $bolsaTrabajo->save();



      Session::flash('message','Trabajo Actualizado con Exito!');
      return Redirect::to('/bolsas');
    }

    public function destroy(BolsaTrabajo $bolsaTrabajo)
    {
        $bolsaTrabajo->delete();

        Session::flash('message','Trabajo Eliminado con Exito!');
        return Redirect::to('/bolsas');
    }



    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////API/////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////


    // api/bolsas/
    public function indexApi()
    {
        $bolsaTrabajo = BolsaTrabajo::all();

        return response()->json([
          "bolsas" => $bolsaTrabajo
        ]);
    }

    public function showApi(BolsaTrabajo $bolsaTrabajo)
    {
      return response()->json([
        "bolsa" => $bolsaTrabajo
      ]);
    }

}
