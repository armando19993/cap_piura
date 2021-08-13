<?php

namespace App\Http\Controllers;

use App\Models\UsuariosExterno;
use Illuminate\Http\Request;
Use Carbon\Carbon;
use Session;

class UsuariosExternoController extends Controller
{
    public function index()
    {
        if(Auth::user() == ""){
            return redirect('/');
        }
        $usuarios = UsuariosExterno::all();

        return view('usuarios-externos.index', ['usuarios' => $usuarios]);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $fecha = substr($request->fecha_nacimiento, 0, 10);
        $usuario = new UsuariosExterno();
        $usuario->nombres = $request->nombres;
        $usuario->apellido_parteno = $request->apellido_paterno;
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->dni = $request->dni;
        $usuario->fecha_nacimiento = $fecha;
        $usuario->sexo = $request->sexo;
        $usuario->correo = $request->correo;
        $usuario->ruc = $request->ruc;
        $usuario->celular = $request->celular;
        $usuario->direccion = $request->direccion;
        $usuario->grado = $request->grado;
        $usuario->profesion = $request->profesion;
        $usuario->estado = 1;
        $usuario->clave = sha1($request->dni);
        $usuario->save();

        return $usuario;
    }


    public function login(Request $request)
    {
        $usuario = UsuariosExterno::where('dni', $request->dni)->where('clave', sha1($request->clave))->first();

        return $usuario;
    }

    public function edit(UsuariosExterno $usuario)
    {
        return view('usuarios-externos.edit', ['usuario' => $usuario]);
    }

    public function update_app(Request $request, UsuariosExterno $usuario)
    {
        $fecha = substr($request->fecha_nacimiento, 0, 10);
        $usuario->correo = $request->correo;
        $usuario->ruc = $request->ruc;
        $usuario->celular = $request->celular;
        $usuario->fecha_nacimiento = $fecha;
        $usuario->direccion = $request->direccion;
        $usuario->save();

        return $usuario;

    }

    public function updateweb(Request $request)
    {
        $usuario = UsuariosExterno::find($request->id);
        $usuario->nombres = $request->nombres;
        $usuario->apellido_parteno = $request->apellido_parteno;
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->correo = $request->correo;
        $usuario->save();

        Session::flash('message','Usuario Editado con Exito!');

        return back();
    }

    public function update_clave(Request $request, UsuariosExterno $usuario){
        if($request->clave1 == $request->clave2){
            $usuario->clave = sha1($request->clave1);
            $usuario->save();

            return $usuario->id;
        }
        else{
            return 0;
        }
    }


    public function destroy(UsuariosExterno $usuariosExterno)
    {
        //
    }

    public function desactivar_usuario(UsuariosExterno $usuario){
        $usuario->estado = 2;
        $usuario->save();

        return back();
    }

    public function activar_usuario(UsuariosExterno $usuario){
        $usuario->estado = 1;
        $usuario->save();

        return back();
    }
}
