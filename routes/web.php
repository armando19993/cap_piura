<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('resetClave', function () {
    return view('resetClave');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Bolsas de Trabajo
Route::get('bolsas', [App\Http\Controllers\BolsaTrabajoController::class, 'index'])->name('bolsas');
Route::get('createTrabajo', [App\Http\Controllers\BolsaTrabajoController::class, 'create'])->name('createTrabajo');
Route::post('saveTrabajo', [App\Http\Controllers\BolsaTrabajoController::class, 'store'])->name('saveTrabajo');
Route::get('viewTrabajo/{bolsaTrabajo}', [App\Http\Controllers\BolsaTrabajoController::class, 'show'])->name('viewTrabajo');
Route::get('editTrabajo/{bolsaTrabajo}', [App\Http\Controllers\BolsaTrabajoController::class, 'edit'])->name('editTrabajo');
Route::post('updateTrabajo/{bolsaTrabajo}', [App\Http\Controllers\BolsaTrabajoController::class, 'update'])->name('updateTrabajo');
Route::get('deleteTrabajo/{bolsaTrabajo}', [App\Http\Controllers\BolsaTrabajoController::class, 'destroy'])->name('deleteTrabajo');
//Fin Bolsa de Trabajo

//Noticias
Route::get('categoriasNoticias', [App\Http\Controllers\CategoriaNoticiaController::class, 'index'])->name('categoriasNoticias');
Route::post('saveCategoriaNoticia', [App\Http\Controllers\CategoriaNoticiaController::class, 'store'])->name('saveCategoriaNoticia');
Route::post('updateCategoriaNoticia', [App\Http\Controllers\CategoriaNoticiaController::class, 'update'])->name('updateCategoriaNoticia');
Route::get('deleteCategoriaNoticia/{categoriaNoticia}', [App\Http\Controllers\CategoriaNoticiaController::class, 'destroy'])->name('deleteCategoriaNoticia');
Route::get('noticias', [App\Http\Controllers\NoticiaController::class, 'index'])->name('noticias');
Route::get('craeateNoticia', [App\Http\Controllers\NoticiaController::class, 'create'])->name('craeateNoticia');
Route::post('saveNoticia', [App\Http\Controllers\NoticiaController::class, 'store'])->name('saveNoticia');
Route::get('viewNoticia/{noticia}', [App\Http\Controllers\NoticiaController::class, 'show'])->name('viewNoticia');
Route::get('deleteNoticia/{noticia}', [App\Http\Controllers\NoticiaController::class, 'destroy'])->name('deleteNoticia');
Route::get('editNoticia/{noticia}', [App\Http\Controllers\NoticiaController::class, 'edit'])->name('editNoticia');
Route::get('deleteImagenNoticia/{imagenNoticia}', [App\Http\Controllers\ImagenNoticiaController::class, 'destroy'])->name('deleteImagenNoticia');
Route::post('updateNoticia/{noticia}', [App\Http\Controllers\NoticiaController::class, 'update'])->name('updateNoticia');
//Fin Noticias

//Junta Directiva
Route::get('categoriasJuntaDirectiva', [App\Http\Controllers\CategoriaJuntaDirectivaController::class, 'index'])->name('categoriasJuntaDirectiva');
Route::post('saveCategoriaJuntaDirectiva', [App\Http\Controllers\CategoriaJuntaDirectivaController::class, 'store'])->name('saveCategoriaJuntaDirectiva');
Route::post('updateCategoriaJuntaDirectiva', [App\Http\Controllers\CategoriaJuntaDirectivaController::class, 'update'])->name('updateCategoriaJuntaDirectiva');
Route::get('deleteCategoriaJuntaDirectiva/{categoriaJuntaDirectiva}', [App\Http\Controllers\CategoriaJuntaDirectivaController::class, 'destroy'])->name('deleteCategoriaJuntaDirectiva');
Route::get('juntaDirectiva', [App\Http\Controllers\JuntaDirectivaController::class, 'index'])->name('juntaDirectiva');
Route::get('createJuntaDirectiva', [App\Http\Controllers\JuntaDirectivaController::class, 'create'])->name('createJuntaDirectiva');
Route::post('saveJuntaDirectiva', [App\Http\Controllers\JuntaDirectivaController::class, 'store'])->name('saveJuntaDirectiva');
Route::get('viewCargo/{juntaDirectiva}', [App\Http\Controllers\JuntaDirectivaController::class, 'show'])->name('viewCargo');
Route::get('editJuntaDirectiva/{juntaDirectiva}', [App\Http\Controllers\JuntaDirectivaController::class, 'edit'])->name('editJuntaDirectiva');
Route::post('updateJuntaDirectiva/{juntaDirectiva}', [App\Http\Controllers\JuntaDirectivaController::class, 'update'])->name('updateJuntaDirectiva');
Route::get('deleteJuntaDirectiva/{juntaDirectiva}', [App\Http\Controllers\JuntaDirectivaController::class, 'destroy'])->name('deleteJuntaDirectiva');
//Fin Junta Dirtectiva

//Directorio
Route::get('directorio', [App\Http\Controllers\DirectorioController::class, 'index'])->name('directorio');
Route::post('updateDirectorio/{directorio}', [App\Http\Controllers\DirectorioController::class, 'update'])->name('updateDirectorio');
Route::get('dependencias', [App\Http\Controllers\DependenciasDirectorioController::class, 'index'])->name('dependencias');
Route::post('saveDependencia', [App\Http\Controllers\DependenciasDirectorioController::class, 'store'])->name('saveDependencia');
Route::post('updateDependencia', [App\Http\Controllers\DependenciasDirectorioController::class, 'update'])->name('updateDependencia');
Route::get('deleteDependencia/{dependenciasDirectorio}', [App\Http\Controllers\DependenciasDirectorioController::class, 'destroy'])->name('deleteDependencia');
Route::get('miembrosDirectorio', [App\Http\Controllers\MiembrosDirectorioController::class, 'index'])->name('miembrosDirectorio');
Route::get('createMiembro', [App\Http\Controllers\MiembrosDirectorioController::class, 'create'])->name('createMiembro');
Route::post('saveMiembro', [App\Http\Controllers\MiembrosDirectorioController::class, 'store'])->name('saveMiembro');
Route::get('viewMiembro/{miembrosDirectorio}', [App\Http\Controllers\MiembrosDirectorioController::class, 'show'])->name('viewMiembro');
Route::get('editMiembro/{miembrosDirectorio}', [App\Http\Controllers\MiembrosDirectorioController::class, 'edit'])->name('editMiembro');
Route::post('updateMiembro/{miembrosDirectorio}', [App\Http\Controllers\MiembrosDirectorioController::class, 'update'])->name('updateMiembro');
Route::get('deleteMiembro/{miembrosDirectorio}', [App\Http\Controllers\MiembrosDirectorioController::class, 'destroy'])->name('deleteMiembro');
//Fin Directorio

//Cursos
Route::get('categoriasCursos', [App\Http\Controllers\CategoriasCursoController::class, 'index'])->name('categoriasCursos');
Route::post('saveCategoriasCurso', [App\Http\Controllers\CategoriasCursoController::class, 'store'])->name('saveCategoriasCurso');
Route::post('updateCategoriaCurso', [App\Http\Controllers\CategoriasCursoController::class, 'update'])->name('updateCategoriaCurso');
Route::get('cursos', [App\Http\Controllers\CursoController::class, 'index'])->name('cursos');
Route::get('createCurso', [App\Http\Controllers\CursoController::class, 'create'])->name('createCurso');
Route::post('saveCurso', [App\Http\Controllers\CursoController::class, 'store'])->name('saveCurso');
Route::get('verCurso/{curso}', [App\Http\Controllers\CursoController::class, 'show'])->name('verCurso');
Route::get('editCurso/{curso}', [App\Http\Controllers\CursoController::class, 'edit'])->name('editCurso');
Route::post('updateCurso/{curso}', [App\Http\Controllers\CursoController::class, 'update'])->name('updateCurso');
Route::get('deleteCurso/{curso}', [App\Http\Controllers\CursoController::class, 'destroy'])->name('deleteCurso');
//Fin Cursos


//Pagos
Route::get('categoriasPagos', [App\Http\Controllers\CategoriasPagoController::class, 'index'])->name('categoriasPagos');
Route::post('saveCategoriaPago', [App\Http\Controllers\CategoriasPagoController::class, 'store'])->name('saveCategoriaPago');
Route::post('updateCategoriaPago', [App\Http\Controllers\CategoriasPagoController::class, 'update'])->name('updateCategoriaPago');
Route::get('pagos', [App\Http\Controllers\PagoController::class, 'index'])->name('pagos');
Route::post('savePago', [App\Http\Controllers\PagoController::class, 'store'])->name('savePago');
Route::get('desactivarPago/{pago}', [App\Http\Controllers\PagoController::class, 'desactivar'])->name('desactivarPago');
Route::get('activarPago/{pago}', [App\Http\Controllers\PagoController::class, 'activar'])->name('activarPago');
Route::get('editar-pago/{pago}', [App\Http\Controllers\PagoController::class, 'edit'])->name('editar-pago');
Route::post('updatePago', [App\Http\Controllers\PagoController::class, 'update'])->name('updatePago');
//Fin Pagos


//Transacciones
Route::get('transacciones', [App\Http\Controllers\TransaccionController::class, 'index'])->name('transacciones');
//Transacciones

//Usuarios Externos
Route::get('usuarios-externos', [App\Http\Controllers\UsuariosExternoController::class, 'index'])->name('usuarios-externos');
Route::get('desactivar-usuario-externo/{usuario}', [App\Http\Controllers\UsuariosExternoController::class, 'desactivar_usuario'])->name('desactivar-usuario-externo');
Route::get('activar-usuario-externo/{usuario}', [App\Http\Controllers\UsuariosExternoController::class, 'activar_usuario'])->name('activar-usuario-externo');
Route::get('editar-usuario-externo/{usuario}', [App\Http\Controllers\UsuariosExternoController::class, 'edit'])->name('editar-usuario-externo');
Route::post('update-usuario-externo-web', [App\Http\Controllers\UsuariosExternoController::class, 'updateweb'])->name('update-usuario-externo-web');


//Usuarios Colegiados
Route::get('usuarios-colegiados', [App\Http\Controllers\UsuariosColegiadoController::class, 'index'])->name('usuarios-colegiados');
Route::get('view-colegiado/{usuariosColegiado}', [\App\Http\Controllers\UsuariosColegiadoController::class, 'show'])->name('view-colegiado');
Route::get('getPagosByCategoria/{categoria}', [\App\Http\Controllers\PagoController::class, 'returnbycategory'])->name('getPagosByCategoria');
Route::post('generar-deuda/{colegiado}', [\App\Http\Controllers\TransaccionController::class, 'store'])->name('generar-deuda');
Route::get('edit-deuda/{transaccion}', [\App\Http\Controllers\TransaccionController::class, 'edit'])->name('edit-deuda');
Route::post('update-transaccion-panel/{transaccion}', [\App\Http\Controllers\TransaccionController::class, 'update_panel'])->name('update-transaccion-panel');
Route::post('update-pago-emision-factura/{transaccion}', [\App\Http\Controllers\TransaccionController::class, 'update_emision_factura'])->name('update-pago-emision-factura');
