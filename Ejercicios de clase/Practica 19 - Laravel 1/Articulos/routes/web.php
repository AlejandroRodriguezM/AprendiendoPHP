<?php

use App\Models\Articulo;
use App\Models\Cliente;
use App\Models\Perfil;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/articulos', function () {
    $articulos=Cliente::find(2)->articulos->where('Pais_Origen','España');
    foreach($articulos as $articulo)
        echo $articulo->Nombre_Articulo."<br>";
});

Route::get('/cliente/{id}/articulo', function ($id) {
    return Cliente::find($id)->articulo;
});
Route::get('/cliente/{id}/perfil', function ($id) {
    $cliente=Cliente::find($id);
    foreach($cliente->perfils as $perfil){
        echo $perfil->Nombre."<br>";
    }
});
Route::get('/perfil/{id}/cliente', function ($id) {
    $perfil=Perfil::find($id);
    foreach($perfil->clientes as $cliente){
        echo $cliente->Nombre." ".$cliente->Apellidos."<br>";
    }
});

Route::get('/articulo/{id}/cliente', function ($id) {
    return Articulo::find($id)->cliente->Nombre;
});

Route::get('/insertar',function(){
    DB::insert('insert into articulos (Nombre_Articulo, Precio,Pais_Origen,Observaciones,seccion) values (?,?,?,?,?)', ['Jarron',15,'Japon','Ganga','Ceramica']);
});

Route::get('/actualizar',function(){
    DB::update("update articulos set seccion='Decoracion' where ID=?", [1]);
});
Route::get("/softdelete",function(){
    $articulo=Articulo::find(1);
    $articulo->delete();
});
Route::get("/leer",function(){
    /*$articulos=Articulo::all();
    foreach($articulos as $articulo){
        echo $articulo->Nombre_Articulo."<br>";
    }*/
   /*$articulo=Articulo::withTrashed()->where('id',1)->get();
    return $articulo;*/

    Articulo::withTrashed()->where('id',1)->restore();
});