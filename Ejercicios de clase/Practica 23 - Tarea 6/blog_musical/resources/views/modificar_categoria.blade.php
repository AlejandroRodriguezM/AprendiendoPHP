@extends('layouts.layout')

@section('title', 'Modificar categoría')

@section('content')
    <header class="py-3">
        <div class="container">
            <h1>Modificar categoría</h1>
        </div>
    </header>

    <main class="container mt-5">
        @foreach ($categorias as $categoria)
                <form action="{{ route('modificar_categoria', $categoria->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la categoría:</label>
                        <input type="text" name="nombre" id="nombre" value="{{ $categoria->nombre_categoria }}"
                            class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar categoría</button>
                </form>
        @endforeach
    </main>
@endsection
