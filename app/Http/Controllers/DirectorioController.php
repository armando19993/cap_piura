<?php

namespace App\Http\Controllers;

use App\Models\Directorio;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;

class DirectorioController extends Controller
{
    public function index()
    {
        if(Auth::user() == ""){
            return redirect('/');
        }
        $directorio = Directorio::all()->first();

        return view('directorio', ['directorio' => $directorio]);
    }

    public function update(Request $request, Directorio $directorio)
    {
      //return $request;
      $directorio->razon_social = $request->razon_social;
      $directorio->ruc = $request->ruc;
      $directorio->telefono = $request->telefono;
      $directorio->horario = $request->horario;
      $directorio->direccion = $request->direccion;
      $directorio->web = $request->web;
      $directorio->facebook = $request->facebook;
      $directorio->instagram = $request->instagram;
      $directorio->youtube = $request->youtube;
      $directorio->save();

      Session::flash('message','Datos del directorio Actualizado!');
      return Redirect::to('/directorio');
    }


    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////API/////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////


    public function indexApi()
    {
        $directorio = Directorio::all()->first();
        return $directorio;
    }
}
