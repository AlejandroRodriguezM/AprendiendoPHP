<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',HomeController::class)->name('home');
// Route::get('cursos',[CursoController::class,'index'])->name("cursos");
// Route::get('cursos/create',[CursoController::class,'create'])->name("create");
// Route::get('cursos/{curso}',[CursoController::class,'show'])->name("show");
// Route::get('cursos/{curso}/{categoria?}',[CursoController::class,'show2'])->name("show2");

Route::controller(CursoController::class)->group(function(){
    Route::get('cursos','index')->name("cursos.index");
    Route::get('cursos/create','create')->name("cursos.create");
    Route::get('cursos/{curso}','show')->name("cursos.show");
    Route::get('cursos/{curso}/{categoria?}','show2')->name("cursos.show2");
    Route::get('usos','usos')->name("cursos.usos");
});



Route::get('/array', function () {
    //return view('welcome');
    $dias=['Lunes','Martes','Miercoles'];
    return $dias;
})->name('array');

Route::get('cursosAnt', function () {
    //return view('welcome');
    return redirect()->route('cursos');
});


