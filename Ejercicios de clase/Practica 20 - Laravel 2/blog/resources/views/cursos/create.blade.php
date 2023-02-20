@extends('layouts.layout')
@section('title', 'Curso create')
@section('content')
    <h1>En esta pagina puedes crear un curso</h1>
    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
        @error('name')
            <br>
            <small>* {{ $message }}</small>
        @enderror
        <br>
        <label>
            Descripcion:
            <br>
            <textarea name="descripcion" rows="5" value="{{ old('descripcion') }}"></textarea>
        </label>
        @error('descripcion')
            <br>
            <small>* {{ $message }}</small>
        @enderror
        <br>
        <label>
            Categoria:
            <br>
            <input type="text" name="categoria" value="{{ old('categoria') }}">
        </label>
        @error('categoria')
            <br>
            <small>* {{ $message }}</small>
        @enderror
        <br>
        <button type="submit">Enviar
            formulario</button>
    </form>

@endsection
