@extends('layouts.layout')
@section('title', 'Home')
@section('content')
    <header class="py-3">
        <div class="container">
            @foreach ($resultados as $resultado)
                <h3>Resultados de búsqueda para {{ request('q') }}</h3>
            @endforeach
        </div>
    </header>
    <main class="container my-3">
        @if (count($resultados) > 0)
            <div class="row">
                @foreach ($resultados as $resultado)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ asset('images/' . $resultado->imagen) }}"
                                alt="{{ $resultado->titulo }}" style="width: 100%;height: 15vw;object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"> <a href="{{ route('ver_articulo', $resultado->id) }}"
                                        class="btn btn-warning">{{ $resultado->titulo }}</a></h5>
                                <p class="card-text">{{ $resultado->contenido }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No se encontraron resultados para {{ request('q') }}</p>
        @endif
    </main>
@endsection
