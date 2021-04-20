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
        $bolsaTrabajo = BolsaTrabajo::all();

        return view('bolsa', ['bolsas' => $bolsaTrabajo]);
    }

    public function create()
    {
        return view('createTrabajo');
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
        return view('verTrabajo', ['bolsa' => $bolsaTrabajo]);
    }

    public function edit(BolsaTrabajo $bolsaTrabajo)
    {
        return view('editTrabajo', ['bolsa' => $bolsaTrabajo]);
    }


    public function update(Request $request, BolsaTrabajo $bolsaTrabajo)
    {
      $bolsaTrabajo->titulo = $request->trabajo;
      $bolsaTrabajo->fecha = $request->fecha;
      $bolsaTrabajo->descripcion = $request->descripcion;
      $bolsaTrabajo->estado = 1;
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
