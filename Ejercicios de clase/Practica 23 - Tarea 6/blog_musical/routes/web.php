<?php

use App\Http\Controllers\ArticuloController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\BusquedaController;
use Illuminate\Support\Facades\Route;


Route::post('/register', [UserController::class, 'store'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', [ArticuloController::class, 'index','destroy'])->name('home');
Route::get('/articulo/{id}', [ArticuloController::class, 'show'])->name('articulo');
Route::get('/modificar/{id}', [ArticuloController::class, 'edit'])->name('modificar');
Route::post('/modificar/{id}', [ArticuloController::class, 'update'])->name('modificar');
Route::get('/eliminar_articulo/{id}', [ArticuloController::class, 'destroy'])->name('eliminar_articulo');
Route::match(['get', 'post'], '/escribir', [ArticuloController::class, 'store'])->name('escribir');
Route::get('/escribir', [CategoriaController::class, 'index_escribir'])->name('escribir');
Route::get('/categorias', [CategoriaController::class, 'index_categoria'])->name('categorias');
Route::get('/categorias', [CategoriaController::class, 'index_comprobar'])->name('categorias');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias');
Route::get('/eliminar_categoria/{id}', [CategoriaController::class, 'destroy'])->name('eliminar_categoria');
Route::get('/modificar_categoria/{id}', [CategoriaController::class, 'edit'])->name('modificar_categoria');
Route::post('/modificar_categoria/{id}', [CategoriaController::class, 'update'])->name('modificar_categoria');
Route::get('/comentarios', [ComentariosController::class, 'index'])->name('comentarios');
Route::post('/comentarios/{id}', [ComentariosController::class, 'activar'])->name('comentarios_activar');
Route::get('/eliminar_comentario/{id}', [ComentariosController::class, 'destroy'])->name('eliminar_comentario');
Route::get('/editores', [UserController::class, 'index'])->name('editores');
Route::post('/editores/{id}', [UserController::class, 'agregarEditor'])->name('editores_agregarEditor');
Route::get('/ver_articulo/{id}', [ArticuloController::class, 'show_articulo'])->name('ver_articulo');
Route::post('/ver_articulo/{id}', [ComentariosController::class, 'store'])->name('ver_articulo');
Route::get('/ver_articulo/{id}', [ComentariosController::class, 'show'])->name('ver_articulo');
Route::get('/busqueda', [BusquedaController::class, 'search'])->name('busqueda');


// Página Nuevo Usuario
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/anecdotas', function () {
    return view('anecdotas');
})->name('anecdotas');

Route::get('/biografia', function () {
    return view('biografia');
})->name('biografia');

Route::get('/discografia', function () {
    return view('discografia');
})->name('discografia');
