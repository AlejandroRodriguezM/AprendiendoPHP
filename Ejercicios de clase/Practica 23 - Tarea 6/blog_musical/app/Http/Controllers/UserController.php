<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Usuario;
use App\Models\Editor;

class UserController extends Controller
{

    public function index()
    {
        // Aquí iría la lógica para obtener los comentarios de la base de datos
        $usuarios = Usuario::all();

        return view('editores', compact('usuarios'));
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'nombre_usuario' => 'required',
        //     'nick' => 'required',
        //     'email' => 'required|email|unique:usuarios',
        //     'contrasena' => 'required|min:8',
        //     'contrasena_confirmation' => 'required|same:password'
        // ]);

        $usuario = new Usuario();
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->nick = $request->nick;
        $usuario->email = $request->email;
        $usuario->contrasena = Hash::make($request->contrasena);
        $usuario->save();

        // Si la tabla de editores está vacía, crea un nuevo registro con el id del usuario recién creado
        if (DB::table('editores')->count() == 0) {
            $editor = new Editor;
            $editor->usuario_id = $usuario->id;
            $editor->save();
        }

        return redirect('/login')->with('success', 'El usuario ha sido creado exitosamente.');
    }


    public function agregarEditor($id)
    {
        $editor = new Editor;
        $editor->usuario_id = $id;
        $editor->save();

        return redirect()->back()->with('success', 'El usuario ha sido añadido como editor');
    }
}
