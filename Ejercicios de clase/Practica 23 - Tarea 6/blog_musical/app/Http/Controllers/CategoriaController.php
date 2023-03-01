<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;


class CategoriaController extends Controller
{
    public function index_escribir()
    {
        $categorias = Categoria::all();
        return view('escribir', compact('categorias'));
    }

    public function index_comprobar()
{
    $categorias = Categoria::all();

    // Si no existen categorías, crear la categoría "Sin categoría"
    if ($categorias->isEmpty()) {
        $sinCategoria = new Categoria();
        $sinCategoria->nombre_categoria = 'Sin categoría';
        $sinCategoria->save();

        // Obtener nuevamente las categorías, incluyendo la nueva categoría creada
        $categorias = Categoria::all();
    }
    elseif($categorias->count() < 2){
        DB::statement('ALTER TABLE categorias AUTO_INCREMENT = 1');
    }

    return view('categorias', compact('categorias'));
}

    public function index_categoria()
    {
        $categorias = Categoria::all();
        return view('categorias', compact('categorias'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Aquí iría la lógica para guardar la categoría en la base de datos
        $categoria = new Categoria();
        $categoria->nombre_categoria = $request->input('nombre');
        $categoria->save();
        session()->flash('success', 'La categoria se ha creado de manera correcta.');
        return redirect()->route('categorias');
    }

    public function edit($id)
    {
        // Aquí iría la lógica para obtener la categoría con el id dado
        $categorias = Categoria::all();
        return view('modificar_categoria', compact('categorias'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre_categoria = $request->input('nombre');
        $categoria->save();
        session()->flash('success', 'La categoria se ha actualizado de manera correcta.');
        return redirect()->route('categorias');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);

        // Si la categoría a eliminar es la categoría por defecto, no permitir su eliminación
        if ($categoria->id === 0) {
            session()->flash('error', 'No se puede eliminar la categoría por defecto.');
            return redirect()->back();
        }

        // Buscar los artículos que tengan la categoría a eliminar y asignarles la categoría por defecto
        $articulos = Articulo::where('categoria_id', $categoria->id)->get();
        $categoriaPorDefecto = Categoria::firstOrCreate(['nombre_categoria' => 'Sin categoría']);

        foreach ($articulos as $articulo) {
            $articulo->categoria_id = $categoriaPorDefecto->id;
            $articulo->save();
        }

        // Eliminar la categoría
        $categoria->delete();
        session()->flash('success', 'La categoría se ha eliminado de manera correcta.');

        return redirect()->route('categorias');
    }
}
