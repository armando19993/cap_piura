<?php

namespace App\Http\Controllers;

use App\Models\JuntaDirectiva;
use App\Models\CategoriaJuntaDirectiva;
use Illuminate\Http\Request;

use Session;
use Redirect;
use Auth;

class JuntaDirectivaController extends Controller
{

    public function index()
    {
        if(Auth::user() == ""){
            return redirect('/');
        }
        $directivas = JuntaDirectiva::with('categoria')->get();

        //return $directivas;

        return view('junta-directiva.juntaDirectiva', ['directivas' => $directivas]);
    }


    public function create()
    {
        $categorias = CategoriaJuntaDirectiva::all();

        return view('junta-directiva.createJuntaDirectiva', ['categorias' => $categorias]);
    }


    public function store(Request $request)
    {
        $cargo = new JuntaDirectiva();
        $cargo->foto = $this->upload_global($request->file('image'), 'fotos');
        $cargo->nombre = $request->nombre;
        $cargo->cargo = $request->cargo;
        $cargo->correo = $request->correo;
        $cargo->telefono = $request->telefono;
        $cargo->categoria_id = $request->categoria;
        $cargo->cip = $request->cip;
        if($request->file('hoja') == ""){}
        else{
          $cargo->hoja_vida = $this->upload_global($request->file('hoja'), 'hojas_vida');
        }
        $cargo->save();

        Session::flash('message','Cargo Creado con Exito!');
        return Redirect::to('/juntaDirectiva');

    }


    public function show(JuntaDirectiva $juntaDirectiva)
    {
        $categorias = CategoriaJuntaDirectiva::all();
        return view('junta-directiva.verJuntaDirectiva', ['junta' =>$juntaDirectiva, 'categorias' => $categorias ]);
    }


    public function edit(JuntaDirectiva $juntaDirectiva)
    {
      $categorias = CategoriaJuntaDirectiva::all();
      return view('junta-directiva.editJuntaDirectiva', ['junta' =>$juntaDirectiva, 'categorias' => $categorias ]);
    }


    public function update(Request $request, JuntaDirectiva $juntaDirectiva)
    {
      if($request->file('hoja') == ""){}
      else{
        $juntaDirectiva->hoja_vida = $this->upload_global($request->file('hoja'), 'hojas_vida');
      }

      if($request->file('image') == ""){}
      else{
        $juntaDirectiva->foto = $this->upload_global($request->file('image'), 'fotos');
      }

      $juntaDirectiva->nombre = $request->nombre;
      $juntaDirectiva->cargo = $request->cargo;
      $juntaDirectiva->correo = $request->correo;
      $juntaDirectiva->telefono = $request->telefono;
      $juntaDirectiva->cip = $request->cip;
      $juntaDirectiva->categoria_id = $request->categoria;
      $juntaDirectiva->save();

      Session::flash('message','Cargo Actualizado con Exito!');
      return Redirect::to('/juntaDirectiva');
    }


    public function destroy(JuntaDirectiva $juntaDirectiva)
    {
        $juntaDirectiva->delete();

        Session::flash('message','Cargo Eliminado con Exito!');
        return Redirect::to('/juntaDirectiva');
    }

    function upload_global($file, $folder){

    $file_type = $file->getClientOriginalExtension();
    $folder = $folder;
    $destinationPath = public_path() . '/uploads/'.$folder;
    $destinationPathThumb = public_path() . '/uploads/'.$folder.'thumb';
    $filename = uniqid().'_'.time() . '.' . $file->getClientOriginalExtension();
    $url = '/uploads/'.$folder.'/'.$filename;

    if ($file->move($destinationPath.'/' , $filename)) {
        return $filename;
    }
  }



  ///////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////
  ///////////////////////API/////////////////////////////////
  ///////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////

  public function indexApi(){
    $juntaDirectiva = JuntaDirectiva::all();

    return response()->json([
      "junta" => $juntaDirectiva
    ]);
  }

  public function juntaByCategory($categoria){
    $junta = JuntaDirectiva::where('categoria_id', $categoria)->get();

    return response()->json([
        "junta" => $junta
    ]);
  }

}
