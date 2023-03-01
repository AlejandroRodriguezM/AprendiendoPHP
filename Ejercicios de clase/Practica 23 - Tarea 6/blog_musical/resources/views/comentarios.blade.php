@extends('layouts.layout')
@section('title', 'Comentarios')
@section('content')
    <header class="py-3">
        <div class="container">
            <h1>Comentarios</h1>
        </div>
    </header>

    <main class="container my-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card mb-3">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($comentarios as $comentario)
                        <li class="list-group-item">
                            <p class="card-text mb-0">{{ $comentario->texto }}</p>

                            @if ($comentario->estado == 1)
                                <button class="btn btn-secondary btn-sm" disabled>Activado</button>
                            @else
                                <form action="{{ route('comentarios_activar', $comentario->id) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Activar</button>
                                </form>
                            @endif
                            <a href="{{ route('eliminar_comentario', $comentario->id) }}" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este comentario?')">Eliminar</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <a href="#" class="btn btn-secondary">Volver a entradas</a>
    </main>
@endsection
