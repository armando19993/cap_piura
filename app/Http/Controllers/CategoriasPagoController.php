<?php

namespace App\Http\Controllers;

use App\Models\CategoriasPago;
use Illuminate\Http\Request;

class CategoriasPagoController extends Controller
{
   
    public function index()
    {
        $categorias = CategoriasPago::all();

        return view('categoriasPagos', ['categorias' => $categorias]);
    }

    
    public function store(Request $request)
    {
        $categoria = new CategoriasPago();
        $categoria->categoria = $request->categoria;
        $categoria->save();

        return back();

    }

    
    public function update(Request $request)
    {
        $categoria = CategoriasPago::find($request->id);
        $categoria->categoria = $request->categoria;
        $categoria->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoriasPago  $categoriasPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriasPago $categoriasPago)
    {
        //
    }
}
