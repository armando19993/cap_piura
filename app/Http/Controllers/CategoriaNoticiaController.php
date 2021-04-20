<?php

namespace App\Http\Controllers;

use App\Models\CategoriaNoticia;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;

class CategoriaNoticiaController extends Controller
{

    public function index()
    {
        $categorias = CategoriaNoticia::all();

        return view('categoriasNoticias', ['categorias' => $categorias]);
    }


    public function store(Request $request)
    {
        $categoria = new CategoriaNoticia();
        $categoria->categoria = $request->categoria;
        $categoria->save();

        Session::flash('message','Categoria Registrada con Exito!');
        return Redirect::to('/categoriasNoticias');
    }

    public function update(Request $request)
    {
         $categoriaNoticia = CategoriaNoticia::find($request->id);

         $categoriaNoticia->categoria = $request->categoria;

         $categoriaNoticia->save();

         Session::flash('message','Categoria Editada con Exito!');
         return Redirect::to('/categoriasNoticias');
    }


    public function destroy(CategoriaNoticia $categoriaNoticia)
    {
        $categoriaNoticia->delete();

        Session::flash('message','Categoria Eliminada con Exito!');
        return Redirect::to('/categoriasNoticias');
    }



    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////API/////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////


    public function indexApi()
    {
        $categorias = CategoriaNoticia::all();

        return response()->json([
          "categorias" => $categorias
        ]);
    }


}
