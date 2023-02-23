<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use Illuminate\Database\Schema\IndexDefinition;
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

Route::get('/', HomeController::class)->name('home');
Route::resource('cursos',CursoController::class);
Route::view('nosotros','nosotros')->name('nosotros');

//SE PUEDE HACER ASÍ, PERO LO COMÚN ES HACERLO CON GROUP
/* Route::get("cursos", ["CursoController::class", 'index'])->name("cursos");
Route::get("cursos/create", ["CursoController::class", 'create'])->name("create");
Route::get("cursos/{curso}", ["CursoController::class", 'show'])->name("show");
Route::get("cursos/{curso}/{categoria?}", ["CursoController::class", 'show2'])->name("show2"); */

//utilizando el group, ASÍ QUEDA TODO MÁS AGRUPADO Y MÁS LIMPIO
Route::controller(CursoController::class)->group(function () {
    Route::get("cursos", "index")->name("cursos.index");
    Route::get("cursos/create", "create")->name("cursos.create");
    Route::get("cursos/usos", "usos")->name("cursos.usos");
    // Route::get("cursos/curso", "show")->name("cursos.show");
    // Route::get("cursos/{curso}/edit", "edit")->name("cursos.edit");

    Route::get('cursos/{curso:slug}', [CursoController::class, 'show'])->name('cursos.show');
    Route::get('cursos/{curso:slug}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
    Route::post("cursos", "store")->name("cursos.store");
    Route::put("cursos/{curso}", "update")->name("cursos.update");
    Route::delete('cursos/{curso}',[CursoController::class,'destroy'])->name('cursos.destroy'); 
});



/* Route::get('cursos', function () {
    // prueba, si vamos a blog.test/cursos me apece el siguiente mensaje:
    return "<h1>Bienvenido a mi pagina de cursos</h1>";
})->name("cursos");

Route::get('cursos/create', function () {
    // prueba, si vamos a blog.test/cursos me apece el siguiente mensaje:
    return "<h1>En esta pagina puedes crear un curso</h1>";
})->name("create"); */

/* Route::get('cursos/{curso}', function ($curso) {
    return "<h1>Estás en el curso: $curso</h1>";
});

//le pone categoria null, porque puede que no le pase ningún parametro
Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {
    if ($categoria) {
        return "<h1>Estás en el curso de $curso de la categoria $categoria</h1>";
    } else {
        return "<h1>Estás en el curso: $curso</h1>";
    }
});*/

/* Route::get('array', function () {
    $dias = ["Lunes", "Martes", "Miercoles"];
    return $dias;
})->name("array");

Route::get('cursosAnt', function () {
    return redirect()->route("cursos");
}); */
