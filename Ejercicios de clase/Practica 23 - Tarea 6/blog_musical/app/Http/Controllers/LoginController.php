<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
class LoginController extends Controller
{

    public function login(Request $request)
    {
        // $request->validate([
        //     'nombre_usuario' => 'required|nombre_usuario',
        //     'contrasena' => 'required|min:8'
        // ]);

        $usuario = Usuario::where('nombre_usuario', $request->nombre_usuario)->first();

        if ($usuario && Hash::check($request->contrasena, $usuario->contrasena)) {
            Auth::login($usuario);
            return redirect('/')->with('success', 'Bienvenido ' . Auth::user()->nombre_usuario);
        } else {
            return back()->with('error', 'El nombre de usuario o la contraseña no son correctos.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


}