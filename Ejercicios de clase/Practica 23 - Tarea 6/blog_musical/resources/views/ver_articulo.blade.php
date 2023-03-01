@extends('layouts.layout')
@section('title', $articulo->titulo)
@section('content')
    <div class="container my-3">
        <h1>{{ $articulo->titulo }}</h1>
        <img class="card-img-top" src="{{ asset('images/' . $articulo->imagen) }}" alt="{{ $articulo->titulo }}"
            style="width: 100%;height: 15vw;object-fit: cover;">
        <p>{{ $articulo->contenido }}</p>
        <p>Categoría: {{ $articulo->categoria->nombre_categoria }}</p>
        <p>Fecha de creación: {{ $articulo->created_at->format('d/m/Y') }}</p>
    </div>

    <div class="container my-3">
        <h2>Comentarios</h2>
        <hr>
        @foreach ($comentarios as $comentario)
            @if ($comentario->estado == 1)
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comentario->nombre }}</h5>
                        <p class="card-text">{{ $comentario->comentario }}</p>
                        <p class="card-text"><small
                                class="text-muted">{{ $comentario->created_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            @endif
        @endforeach


        <h3>Agregar comentario</h3>
        <hr>
        <form method="POST" action="{{ route('ver_articulo', $articulo->id) }}">
            @csrf
            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" required>
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido del comentario</label>
                <textarea class="form-control" name="comentario" id="comentario" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Agregar comentario</button>
        </form>
    </div>
@endsection
