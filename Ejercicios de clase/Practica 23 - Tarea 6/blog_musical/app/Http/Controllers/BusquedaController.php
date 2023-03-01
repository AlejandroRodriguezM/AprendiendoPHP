<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusquedaController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'q' => 'nullable|min:1' // el campo no es requerido, pero si se proporciona, debe tener una longitud mínima de 1
        ]);

        if ($request->has('q')) { // si el campo está presente y no está vacío
            $term = strtolower($request->input('q'));

            $resultados = DB::table('articulos')
                ->whereRaw('LOWER(titulo) LIKE ?', ['%' . $term . '%'])
                ->orWhereRaw('LOWER(contenido) LIKE ?', ['%' . $term . '%'])
                ->get();
        } else {
            $resultados = collect(); // crear una colección vacía si no se proporciona un término de búsqueda
        }

        return view('busqueda', compact('resultados'));
    }
}
