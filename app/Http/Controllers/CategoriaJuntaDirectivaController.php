<?php

namespace App\Http\Controllers;

use App\Models\CategoriaJuntaDirectiva;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;


class CategoriaJuntaDirectivaController extends Controller
{

    public function index()
    {
        if(Auth::user() == ""){
            return redirect('/');
        }
      $categorias = CategoriaJuntaDirectiva::all();

      return view('categoriasJuntaDirectiva', ['categorias' => $categorias]);
    }


    public function store(Request $request)
    {
        $categoria = new CategoriaJuntaDirectiva();
        $categoria->categoria = $request->categoria;
        $categoria->save();

        Session::flash('message','Categoria Registrada con Exito!');
        return Redirect::to('/categoriasJuntaDirectiva');
    }


    public function update(Request $request)
    {
        $categoria = CategoriaJuntaDirectiva::find($request->id);

        $categoria->categoria = $request->categoria;
        $categoria->save();

        Session::flash('message','Categoria Actualizada con Exito!');
        return Redirect::to('/categoriasJuntaDirectiva');
    }


    public function destroy(CategoriaJuntaDirectiva $categoriaJuntaDirectiva)
    {
        $categoriaJuntaDirectiva->delete();

        Session::flash('message','Categoria Eliminada con Exito!');
        return Redirect::to('/categoriasJuntaDirectiva');
    }


    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////API/////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////


    public function indexApi()
    {
      $categorias = CategoriaJuntaDirectiva::all();

      return response()->json([
        "categorias" => $categorias
      ]);
    }

}
