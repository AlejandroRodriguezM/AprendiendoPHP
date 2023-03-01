@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <header class="py-3">
        <div class="container">
            <h1 class="fw-bold">Lista de Editores</h1>
        </div>
    </header>

    <main class="container my-3">
        <div class="card mb-3">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->nombre_usuario }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    @if ($usuario->esEditor($usuario->id))
                                        <button type="button" class="btn btn-success" disabled>Activado</button>
                                    @else
                                        @if (Auth::user()->esEditor(auth()->id()))
                                            <form action="{{ route('editores_agregarEditor', $usuario->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Hacer Editor</button>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-primary" style="cursor: not-allowed;">Hacer Editor</button>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
