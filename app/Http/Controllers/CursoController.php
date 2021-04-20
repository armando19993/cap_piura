<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\CategoriasCurso;
use App\Models\RelacionCurso;
use Illuminate\Http\Request;

use Session;
use Redirect;
use Auth;

class CursoController extends Controller
{

    public function index()
    {
        $cursos = Curso::with('categoria')->withCount('cupos')->get();
        //return $cursos;
        return view('cursos', ['cursos' => $cursos]);
    }

    public function indexApi()
    {
        $cursos = Curso::with('categoria')->withCount('cupos')->get();
        return response()->json([
            'cursos' => $cursos
        ]);
    }


    public function create()
    {
        $categorias = CategoriasCurso::all();

        return view('createCurso', ['categorias' => $categorias]);
    }


    public function store(Request $request)
    {
        $curso = new Curso();
        $curso->foto = $this->upload_global($request->file('image'), 'fotos');
        $curso->titulo = $request->titulo;
        $curso->fecha_inicio = $request->fecha_inicio;
        $curso->hora = $request->hora;
        $curso->tipo = $request->tipo;
        $curso->descripcion = $request->descripcion;
        $curso->costo = $request->costo;
        $curso->ubicacion = $request->ubicacion;
        $curso->cupos = $request->cupos;
        $curso->whatsapp = $request->whatsapp;
        $curso->categoria_id = $request->categoria;
        $curso->save();

        Session::flash('message','Curso Creada con Exito!');
        return Redirect::to('/cursos');
    }


    public function show( $curso )
    {
        $curso = Curso::where('id', $curso)->with('categoria')->withCount('cupos')->first();
        $inscritos = RelacionCurso::where('id_curso', $curso->id)->get();
        //return $inscritos;
        //return $curso;
        return view('verCurso', ['curso' => $curso, 'inscritos' => $inscritos]);
    }


    public function edit(Curso $curso)
    {
        $categorias = CategoriasCurso::all();
        return view('editCurso', ['curso' => $curso, 'categorias' => $categorias]);
    }


    public function update(Request $request, Curso $curso)
    {
        if($request->file('image') == ""){}
        else{
            $curso->foto = $this->upload_global($request->file('image'), 'fotos');
        }
        $curso->titulo = $request->titulo;
        $curso->fecha_inicio = $request->fecha_inicio;
        $curso->hora = $request->hora;
        $curso->tipo = $request->tipo;
        $curso->descripcion = $request->descripcion;
        $curso->costo = $request->costo;
        $curso->ubicacion = $request->ubicacion;
        $curso->cupos = $request->cupos;
        $curso->whatsapp = $request->whatsapp;
        $curso->categoria_id = $request->categoria;
        $curso->save();

        Session::flash('message','Curso Actualizado con Exito!');
        return Redirect::to('/cursos');
    }


    public function destroy(Curso $curso)
    {
        $relaciones = RelacionCurso::where('id_curso', $curso->id)->delete();
        $curso->delete();

        Session::flash('message','Curso Eliminado con Exito!');
        return Redirect::to('/cursos');
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
}
