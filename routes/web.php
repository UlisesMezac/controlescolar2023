<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CicloescolarController;
use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\TramitesController;
use App\Http\Controllers\PreinscripcionController;
use App\Http\Controllers\PadresController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\TrasladoController;
use App\Http\Controllers\ReinscripcionController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


////MENU////
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home/agregar', [App\Http\Controllers\HomeController::class, 'store']);


//// CRUD DE USUARIOS////
Route::get('/Indexus',[UsuariosController::class,'index'])->name('usuario.index')->middleware('auth');


//// CRUD DE CICLO ESCOLAR////
Route::get('/Index',[CicloescolarController::class,'index'])->name('cicloescolar.index')->middleware('auth');

Route::get('/Agregar',[CicloescolarController::class,'create'])->name('cicloescolar.create')->middleware('auth');

Route::post('/Agregar',[CicloescolarController::class,'store'])->name('cicloescolar.store')->middleware('auth');

Route::get('/Editar.{ciclo}',[CicloescolarController::class,'edit'])->name('cicloescolar.edit')->middleware('auth');

Route::put('/Index.{ciclo}',[CicloescolarController::class,'update'])->name('cicloescolar.update')->middleware('auth');

Route::delete('/Index/{id}',[CicloescolarController::class,'destroy'])->name('cicloescolar.destroy')->middleware('auth');


////CRUD DE MAESTROS////
Route::get('/Indexmaestro',[MaestrosController::class,'index'])->name('maestro.index')->middleware('auth');

Route::get('/Agregarmaestro',[MaestrosController::class,'create'])->name('maestro.create')->middleware('auth');

Route::post('/Indexmaestro',[MaestrosController::class,'store'])->name('maestro.store')->middleware('auth');

Route::get('/Perfilmaestro.{id}',[MaestrosController::class,'show'])->name('maestro.show')->middleware('auth');

Route::get('/Editarmaestro.{maestro}',[MaestrosController::class,'edit'])->name('maestro.edit')->middleware('auth');

Route::put('/Editarmaestro.{maestro}',[MaestrosController::class,'update'])->name('maestro.update')->middleware('auth');

Route::delete('/Indexmaestro/{maestro}',[MaestrosController::class,'destroy'])->name('maestro.destroy')->middleware('auth');

Route::get('Indexmaestro/pdf', [MaestrosController::class, 'pdf'])->name('maestro.pdf')->middleware('auth');


////CRUD DE GRUPOS////
Route::get('/Indexgrupo',[GruposController::class,'index'])->name('grupo.index')->middleware('auth');

Route::get('/Agregargrupo',[GruposController::class,'create'])->name('grupo.create')->middleware('auth');

Route::post('/Agregargrupo',[GruposController::class,'store'])->name('grupo.store')->middleware('auth');

Route::get('/Editargrupo.{grupo}',[GruposController::class,'edit'])->name('grupo.edit')->middleware('auth');

Route::put('/Editargrupo.{grupo}',[GruposController::class,'update'])->name('grupo.update')->middleware('auth');

Route::delete('/Indexgrupo/{grupo}',[GruposController::class,'destroy'])->name('grupo.destroy')->middleware('auth');

Route::get('/Perfilgrupo.{id}',[GruposController::class,'show'])->name('grupo.show')->middleware('auth');

Route::get('/Perfilalumno.{id}',[GruposController::class,'perfil'])->name('grupo.perfil')->middleware('auth');

Route::get('Perfilgrupo/pdf.{id}', [GruposController::class, 'pdf'])->name('grupo.pdf')->middleware('auth');

Route::get('Credencial/credencial.{id}', [GruposController::class, 'credencial'])->name('grupo.credencial')->middleware('auth');


////CRUD DE PREINSCRIPCIÓN////
Route::get('/Agregarpre',[PreinscripcionController::class,'create'])->name('preinscripcion.create')->middleware('auth');

Route::post('/Agregarpre',[PreinscripcionController::class,'store'])->name('preinscripcion.store')->middleware('auth');

Route::get('/Indexpre',[PreinscripcionController::class,'index'])->name('preinscripcion.index')->middleware('auth');

Route::get('/Editarpre.{proceso}',[PreinscripcionController::class,'edit'])->name('preinscripcion.edit')->middleware('auth');

Route::put('/Editarpre.{proceso}',[PreinscripcionController::class,'update'])->name('preinscripcion.update')->middleware('auth');

Route::get('/Perfilpre.{id}',[PreinscripcionController::class,'show'])->name('preinscripcion.show')->middleware('auth');

Route::get('Perfilpre/pdf.{id}', [PreinscripcionController::class, 'pdf'])->name('preinscripcion.pdf')->middleware('auth');


////CRUD DE PADRES////
Route::get('/Indexpadre',[PadresController::class,'index'])->name('padre.index')->middleware('auth');

Route::get('/Agregarpadre',[PadresController::class,'create'])->name('padre.create')->middleware('auth');

Route::post('/Agregarpre.padres',[PadresController::class,'store'])->name('padre.store')->middleware('auth');

Route::get('/Perfilpadre.{id}',[PadresController::class,'show'])->name('padre.show')->middleware('auth');

Route::get('/Editarpadre.{padre}',[PadresController::class,'edit'])->name('padre.edit')->middleware('auth');

Route::put('/Editarpadre.{padre}',[PadresController::class,'update'])->name('padre.update')->middleware('auth');


////CRUD DE INSCRIPCIÓN////
Route::get('/Indexinscripcion',[InscripcionController::class,'index'])->name('inscripcion.index')->middleware('auth');

Route::get('/Procesoindex',[InscripcionController::class,'procesoindex'])->name('inscripcion.procesoindex')->middleware('auth');

Route::get('/Agregarinscripcion.{proceso}',[InscripcionController::class,'create'])->name('inscripcion.create')->middleware('auth');

Route::put('/Agregarinscripcion.{proceso}',[InscripcionController::class,'store'])->name('inscripcion.store')->middleware('auth');


////CRUD DE ALUMNOS////
Route::get('/Agregaralumno',[AlumnosController::class,'create'])->name('alumno.create')->middleware('auth');

Route::post('/Agregaralumno',[AlumnosController::class,'store'])->name('alumno.store')->middleware('auth');

Route::get('/Editaralumno.{alumno}',[AlumnosController::class,'edit'])->name('alumno.edit')->middleware('auth');

Route::put('/Editaralumno.{alumno}',[AlumnosController::class,'update'])->name('alumno.update')->middleware('auth');

Route::get('/Calificacion.{proceso}',[AlumnosController::class,'calificacion'])->name('alumno.calificacion')->middleware('auth');

Route::put('/Calificacion.{proceso}',[AlumnosController::class,'GuardarCali'])->name('alumno.guardar')->middleware('auth');

////CRUD DE TRASLADO////
Route::get('/Agregartras',[AlumnosController::class,'createTraslado'])->name('alumno.createTraaslado')->middleware('auth');

Route::post('/Agregartras',[AlumnosController::class,'storeTraslado'])->name('alumno.storeTraslado')->middleware('auth');

Route::post('/Agregartras.padre',[PadresController::class,'storeTraslado'])->name('padre.storeTraslado')->middleware('auth');

Route::get('/Procesotraslado',[TrasladoController::class,'create'])->name('traslado.create')->middleware('auth');

Route::post('/Procesotraslado',[TrasladoController::class,'store'])->name('traslado.store')->middleware('auth');


////CRUD DE REINSCRIPCIÓN////
Route::get('/Agregarreins.{proceso}',[ReinscripcionController::class,'create'])->name('reins.create')->middleware('auth');

Route::get('/Indexreins',[ReinscripcionController::class,'index'])->name('reins.index')->middleware('auth');

Route::get('/Perfilreins.{id}',[ReinscripcionController::class,'show'])->name('reins.show')->middleware('auth');

Route::put('/Agregarreins.{proceso}',[ReinscripcionController::class,'store'])->name('reins.store')->middleware('auth');

