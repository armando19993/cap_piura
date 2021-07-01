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

    public function activar(UsuariosColegiado $colegiado)
    {
        $colegiado->estado = 1;
        $colegiado->save();

        return back();
    }

    public function desactivar(UsuariosColegiado $colegiado)
    {
        $colegiado->estado = 0;
        $colegiado->save();

        return back();
    }


    public function update_estado()
    {
        $usuarios = UsuariosColegiado::all();

        foreach ($usuarios as $usuario ) {
            $deudas = Transaccion::where('reg_cap', $usuario->reg_cap)->count();
            if($deudas > 0){
                $usuario->estado = 0;
                $usuario->save();
            }
            else{
                $usuario->estado = 1;
                $usuario->save();
            }
        }
    }

    public function login(Request $request)
    {
        $login = UsuariosColegiado::where('reg_cap', $request->reg_cap)->where('clave', sha1($request->clave))->first();

        return $login;
    }

    public function show(UsuariosColegiado $usuariosColegiado)
    {
        $categorias = CategoriasPago::all();
        $deudas = Transaccion::where('reg_cap', $usuariosColegiado->reg_cap)->where('estado', 1)->get();
        $pagados = Transaccion::where('reg_cap', $usuariosColegiado->reg_cap)->where('estado', 2)->get();
        return view('usuarios-colegiados.view', ['usuario' => $usuariosColegiado, 'categorias' => $categorias, 'deudas' => $deudas, 'pagados' => $pagados]);
    }

    public function deudas($colegiado)
    {
        $deudas = Transaccion::where('reg_cap', $colegiado)->where('estado', 1)->get();

        return $deudas;
    }

    public function pagados($colegiado)
    {
        $deudas = Transaccion::where('reg_cap', $colegiado)->where('estado', 2)->get();

        return $deudas;
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
