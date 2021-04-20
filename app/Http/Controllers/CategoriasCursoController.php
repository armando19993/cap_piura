<?php

namespace App\Http\Controllers;

use App\Models\CategoriasCurso;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;

class CategoriasCursoController extends Controller
{

    public function index()
    {
        $categorias = CategoriasCurso::all();

        return view('categoriasCursos', ['categorias' => $categorias]);
    }

    public function indexApi()
    {
        $categorias = CategoriasCurso::all();

        return response()->json([
           'categorias' => $categorias
        ]);
    }


    public function store(Request $request)
    {
        $categoria = new CategoriasCurso();
        $categoria->categoria = $request->categoria;
        $categoria->save();

        Session::flash('message','Categoria Registrada con Exito!');
        return Redirect::to('/categoriasCursos');
    }

    public function update(Request $request)
    {
         $categoriaNoticia = CategoriasCurso::find($request->id);

         $categoriaNoticia->categoria = $request->categoria;

         $categoriaNoticia->save();

         Session::flash('message','Categoria Editada con Exito!');
         return Redirect::to('/categoriasCursos');
    }


}
