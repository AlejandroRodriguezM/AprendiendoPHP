@extends('layouts.layout')
@section('title', 'Cursos')
@section('content')
    <h1>Bienvenido a la pagina de cursos</h1>
    <a href="{{ route('cursos.create') }}">Crear curso</a>
    <ul>
        @foreach ($cursos as $curso)
            <li>
                <a href="{{ route('cursos.show', $curso) }}"> {{ $curso->name }}</a>
            </li>
        @endforeach

    </ul>
    {{ $cursos->links() }}
@endsection
