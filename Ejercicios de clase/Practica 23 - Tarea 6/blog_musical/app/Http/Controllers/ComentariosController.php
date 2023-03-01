<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Articulo;

class ComentariosController extends Controller
{
    public function index()
    {
        // Aquí iría la lógica para obtener los comentarios de la base de datos
        $comentarios = Comentario::all();

        return view('comentarios', compact('comentarios'));
    }

    public function destroy($id)
    {
        // Aquí iría la lógica para borrar el comentario con el id dado de la base de datos
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();

        session()->flash('success', 'El comentario se ha eliminado de manera correcta.');

        return redirect()->back();
    }

    public function activar($id)
    {
        // Aquí iría la lógica para activar el comentario con el id dado de la base de datos
        $comentario = Comentario::find($id);
        $comentario->estado = 1;
        $comentario->save();
        session()->flash('success', 'El comentario se ha activado de manera correcta.');
        return redirect()->back();
    }

    public function store(Request $request)
    {
        // Aquí iría la lógica para guardar el comentario en la base de datos
        $comentario = new Comentario();
        $articulo = Articulo::find($request->input('articulo_id'));
        $comentario->nombre = $request->input('nombre_usuario');
        $comentario->comentario = $request->input('comentario');
        $comentario->estado = 0;
        $comentario->articulos_id = $request->id;
        $comentario->save();

        session()->flash('success', 'El comentario se ha creado de manera correcta.');
        return redirect()->back();
    }

    public function show($id)
    {
        // Aquí iría la lógica para obtener el comentario con el id dado de la base de datos
        $comentarios = Comentario::where('articulos_id', $id)->get();
        $articulo = Articulo::find($id);
        if ($comentarios) {
            return view('ver_articulo', compact('comentarios', 'articulo'));
        } else {
            return "No se encontraron comentarios para este artículo.";
        }
    }

    public function estado($id){
        $comentario = Comentario::findOrFail($id);
        if($comentario->estado == 1){
            return true;
        }else{
            return false;
        }
    }
}
