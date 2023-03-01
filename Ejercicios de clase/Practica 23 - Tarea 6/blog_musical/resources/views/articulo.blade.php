@extends("layouts.layout")
@section("title", "Home")
@section("content")
    <div class="container">
        <h1>{{ $articulo->titulo }}</h1>
        <p>{{ $articulo->contenido }}</p>
        <p>Categoría: {{ $articulo->categoria->nombre_categoria }}</p>
        <p>Fecha: {{ $articulo->created_at->format('d/m/Y') }}</p>
    </div>
@endsection