<?php
namespace App\Http\Controllers;

use App\Models\Transaccion;
use App\Models\UsuariosColegiado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('bolsas',[BolsaTrabajoController::class, 'indexApi']);
Route::get('bolsas/{bolsaTrabajo}',[BolsaTrabajoController::class, 'showApi']);
Route::get('categoriasNoticias',[CategoriaNoticiaController::class, 'indexApi']);
Route::get('noticias', [NoticiaController::class, 'indexApi']);
Route::get('noticias/{noticia}', [NoticiaController::class, 'noticia']);
Route::get('noticiasByCategoria/{categoria}', [NoticiaController::class, 'noticiasByCategoria']);
Route::get('junta', [JuntaDirectivaController::class, 'indexApi']);
Route::get('categoriasJuntas', [CategoriaJuntaDirectivaController::class, 'indexApi']);
Route::get('directorio', [DirectorioController::class, 'indexApi']);
Route::get('dependencias', [DependenciasDirectorioController::class, 'indexApi']);
Route::get('miembrosDependencias', [MiembrosDirectorioController::class, 'indexApi']);
Route::get('categoriasCursos', [CategoriasCursoController::class, 'indexApi']);
Route::get('cursos', [CursoController::class, 'indexApi']);


//Usuarios Externos
Route::post('createUsuarioExterno', [UsuariosExternoController::class, 'store']);
Route::post('update-usuario-externo-app/{usuario}', [UsuariosExternoController::class, 'update_app']);
Route::post('update-clave-externo-app/{usuario}', [UsuariosExternoController::class, 'update_clave']);

//Logins
Route::post('login-externo', [UsuariosExternoController::class, 'login']);
Route::post('login-colegiado', [UsuariosColegiadoController::class, 'login']);

//Facturacion
Route::get('verificarRUC/{ruc}', [FacturacionController::class, 'verificarruc']);


//Estado de Cuenta Colegiados
Route::get('deudas/{colegiado}', [UsuariosColegiadoController::class, 'deudas']);
Route::get('pagados/{colegiado}', [UsuariosColegiadoController::class, 'pagados']);
Route::get('deuda/{deuda}', [TransaccionController::class, 'show']);
Route::post('update-deuda', [TransaccionController::class, 'update_tipo_documento']);
Route::get('update-mercadopago-procesado/{pago}/{id_mercadopago}', [TransaccionController::class, 'update_mercado_pago']);
