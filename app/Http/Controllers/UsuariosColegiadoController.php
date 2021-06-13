<?php

namespace App\Http\Controllers;

use App\Models\CategoriasPago;
use App\Models\Transaccion;
use App\Models\UsuariosColegiado;
use Illuminate\Http\Request;

class UsuariosColegiadoController extends Controller
{
    public function index()
    {
        $usuarios = UsuariosColegiado::all();

        return view('usuarios-colegiados.index', ['usuarios' => $usuarios]);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show(UsuariosColegiado $usuariosColegiado)
    {
        $categorias = CategoriasPago::all();
        $deudas = Transaccion::where('reg_cap', $usuariosColegiado->reg_cap)->where('estado', 1)->get();
        $pagados = Transaccion::where('reg_cap', $usuariosColegiado->reg_cap)->where('estado', 2)->get();
        return view('usuarios-colegiados.view', ['usuario' => $usuariosColegiado, 'categorias' => $categorias, 'deudas' => $deudas, 'pagados' => $pagados]);
    }

    public function edit(UsuariosColegiado $usuariosColegiado)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsuariosColegiado  $usuariosColegiado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsuariosColegiado $usuariosColegiado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsuariosColegiado  $usuariosColegiado
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsuariosColegiado $usuariosColegiado)
    {
        //
    }
}
