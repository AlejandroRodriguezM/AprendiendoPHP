@extends('layouts.layout')

@section('title', 'Agregar Editor')

@section('content')
    <div class="container my-3">
        <h1>Agregar Editor</h1>
        <hr>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('usuarios.agregarEditor', $usuario->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary" @if ($esEditor) disabled @endif>Hacer Editor</button>
                </form>
            </div>
        </div>
    </div>
@endsection
