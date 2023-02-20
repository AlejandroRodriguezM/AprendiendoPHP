<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Articulo;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insertar', function () {
    DB::insert('insert into articulos (Nombre_Articulo,precio,Pais_Origen,Observaciones,seccion) values (?, ?, ?, ?, ?)', ['Jarron',15,'Japon','Ganga','Ceramica']);
});

Route::get('/actualizar', function () {
    DB::update('update articulos set seccion = "Decoracion" where ID = ?', [1]);
});

Route::get('/softdelete', function () {
    $articulo=Articulo::find(1);
    $articulo->delete();
});

Route::get('/leer', function () {
    $articulos=Articulo::all();
    foreach($articulos as $articulo){
        echo $articulo->Nombre_Articulo."<br>";
    }

    /*$articulo=Articulo::withTrashed()->where('id',1)->get();
    return $articulo;*/

    //Articulo::withTrashed()->where('id',1)->restore();
});


