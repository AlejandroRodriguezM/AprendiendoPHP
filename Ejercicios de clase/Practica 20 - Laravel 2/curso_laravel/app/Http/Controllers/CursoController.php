<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurso;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "<h1>Bienvenido a mi pagina de cursos</h1>";
        $cursos = Curso::orderBy('id', 'desc')->paginate();
        return view('cursos.index', compact('cursos'));
    }

    public function usos()
    {
        $users = ["Antonio", "Ana", "María", "Juan"];
        // return "<h1>Bienvenido a mi pagina de cursos</h1>";
        return view('cursos.usos', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return "<h1>En esta pagina puedes crear un curso</h1>";
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurso $request)
    {

        /*         $curso = new Curso();
        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save(); */
        $curso = Curso::create($request->all());
        return redirect()->route('cursos.show', $curso);
    }

    /**
     * Display the specified resource.
     *
     * @param  object  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso) //si aqui se le pone p.e. curso2, no se muestra nada
    {
        // return "<h1>Bienvenido al curso: $id</h1>";
        // return view('cursos.show', ["curso" => $curso]);
        return view('cursos.show', compact('curso'));
    }

    public function show2($curso, $categoria = null)
    {
        if ($categoria) {
            return "<h1>Estás en el curso de $curso de la categoria $categoria</h1>";
        } else {
            return "<h1>Estás en el curso: $curso</h1>";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            "name" => "required|max:10",
            "descripcion" => "required|min:10",
            "categoria" => "required"
        ]);

        // $curso = new Curso();
        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // $curso->save();
        $curso->update($request->all());
        return redirect()->route('cursos.show', $curso);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index');
    }
}
