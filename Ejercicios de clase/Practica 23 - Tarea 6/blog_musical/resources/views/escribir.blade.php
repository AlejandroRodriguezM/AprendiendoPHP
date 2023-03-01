@extends("layouts.layout")
@section("title", "Home")
@section("content")

<!-- Cabecera -->
<header class="py-3">
    <div class="container">
        <h1>Escribir artículo</h1>
    </div>
</header>
<!-- Formulario para escribir artículo -->
<form class="container my-3" action="{{ route('escribir') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="titulo" class="form-label">Título:</label>
        <input type="text" name="titulo" id="titulo" class="form-control">
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Categoría:</label>
        <select name="categoria" id="categoria" class="form-select">
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="contenido" class="form-label">Contenido:</label>
        <textarea name="contenido" id="contenido" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Imagen:</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Publicar</button>
</form>
<!-- Volver a entradas -->
<div class="container my-3">
    <a href="{{ route('home') }}" class="btn btn-secondary">Volver a entradas</a>
</div>
@endsection