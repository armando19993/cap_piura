<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\ImagenNoticia;
use App\Models\CategoriaNoticia;
use Illuminate\Http\Request;

use Session;
use Redirect;
use Auth;


class NoticiaController extends Controller
{

    public function index()
    {
        $noticias = Noticia::with('categoria')->get();
        //return $noticias[0]->categoria;
        return view('noticias', ['noticias' => $noticias]);
    }



    public function create()
    {
        $categorias = CategoriaNoticia::all();

        return view('createNoticia', ['categorias' => $categorias]);
    }

    public function edit(Noticia $noticia)
    {
        $categorias = CategoriaNoticia::all();

        return view('editNoticia', ['categorias' => $categorias, 'noticia' => $noticia]);
    }


    public function store(Request $request)
    {
      $noticia = new Noticia();
      $noticia->categoria_id = $request->categoria;
      $noticia->titulo = $request->titulo;
      $noticia->fecha = $request->fecha;
      $noticia->contenido = $request->contenido;
      $noticia->save();

        $files = $request->file('image');

        foreach($files as $file){
        $cari = $this->upload_global($file, 'noticias');

          $imagen = new ImagenNoticia();
          $imagen->noticia_id = $noticia->id;
          $imagen->imagen = $cari;
          $imagen->save();
        }

        Session::flash('message','Noticia Creada con Exito!');
        return Redirect::to('/noticias');
    }

    public function update(Request $request, Noticia $noticia)
    {
      $noticia->categoria_id = $request->categoria;
      $noticia->titulo = $request->titulo;
      $noticia->contenido = $request->contenido;
      $noticia->save();

        $files = $request->file('image');
        if($files != null){
        foreach($files as $file){
        $cari = $this->upload_global($file, 'noticias');

          $imagen = new ImagenNoticia();
          $imagen->noticia_id = $noticia->id;
          $imagen->imagen = $cari;
          $imagen->save();
        }
      }

        Session::flash('message','Noticia Actualizada con Exito!');
        return back();
    }


    public function show($noticia)
    {
      $noticia = Noticia::where('id', $noticia)->with('categoria', 'imagenes')->first();
      //return $noticia;
      return view('verNoticia', ['noticia' => $noticia]);
    }



    public function destroy(Noticia $noticia)
    {
        $noticia->delete();

        Session::flash('message','Noticia Eliminada con Exito!');
        return Redirect::to('/noticias');
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


    public function indexApi()
    {
        $noticias = Noticia::with('categoria', 'imagenes')->get();

        return response()->json([
          "noticias" => $noticias
        ]);
    }

    public function noticia(Noticia $noticia){
      $noticia = Noticia::where('id', $noticia->id)->with('categoria', 'imagenes')->first();

      return response()->json([
        'noticia' => $noticia
      ]);
    }

    public function noticiasByCategoria($categoria){
        $noticias = Noticia::where('categoria_id', $categoria)->with('categoria', 'imagenes')->get();

        return response()->json([
          "noticias" => $noticias
        ]);
    }
}
