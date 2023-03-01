@extends('layouts.layout')
@section('title', 'Home')
@section('content')
    <!-- Cabecera -->
    <header class="py-3">
        <div class="container">
            <h1>Editar y modificar artículos ya publicados</h1>
        </div>
    </header>

    <!-- Formulario para escribir artículo -->
    <form class="container my-3" action="{{ route('modificar', $articulo->id) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $articulo->titulo }}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoría:</label>
            <select name="category" id="category" class="form-select">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $categoria->id == $articulo->categoria_id ? 'selected' : '' }}>
                        {{ $categoria->nombre_categoria }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenido:</label>
            <textarea name="content" id="content" class="form-control">{{ $articulo->contenido }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Imagen:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>


    <!-- Volver a entradas -->
    <div class="container my-3">
        <a href="#" class="btn btn-secondary">Volver a entradas</a>
    </div>

@endsection
