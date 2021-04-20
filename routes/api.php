<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('bolsas',[BolsaTrabajoController::class, 'indexApi']);
Route::get('bolsas/{bolsaTrabajo}',[BolsaTrabajoController::class, 'showApi']);
Route::get('categoriasNoticias',[CategoriaNoticiaController::class, 'indexApi']);
Route::get('noticias', [NoticiaController::class, 'indexApi']);
Route::get('noticiasByCategoria/{categoria}', [NoticiaController::class, 'noticiasByCategoria']);
Route::get('junta', [JuntaDirectivaController::class, 'indexApi']);
Route::get('categoriasJuntas', [CategoriaJuntaDirectivaController::class, 'indexApi']);
Route::get('directorio', [DirectorioController::class, 'indexApi']);
Route::get('dependencias', [DependenciasDirectorioController::class, 'indexApi']);
Route::get('miembrosDependencias', [MiembrosDirectorioController::class, 'indexApi']);
Route::get('categoriasCursos', [CategoriasCursoController::class, 'indexApi']);
Route::get('cursos', [CursoController::class, 'indexApi']);
