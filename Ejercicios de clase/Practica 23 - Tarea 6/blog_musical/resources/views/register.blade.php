<!-- register.blade.php -->
@extends('layouts.layout')
@section('title', 'Home')
@section('content')
    <!-- Cabecera -->
    <header class="py-3">
        <div class="container">
            <h1 class="h2">Registro de Nuevo Usuario</h1>
        </div>
    </header>

    <div class="container my-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario de registro -->
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Nombre:</label>
                <input type="text" name="nombre_usuario" id="nombre_usuario" value="{{ old('nombre_usuario') }}"
                    class="form-control">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nick" class="form-label">Nick:</label>
                <input type="text" name="nick" id="nick" value="{{ old('nick') }}" class="form-control">
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" class="form-control">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contrasena_confirmation" class="form-label">Confirmar Contraseña:</label>
                <input type="password" name="contrasena_confirmation" id="contrasena_confirmation" class="form-control">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="{{ route('login') }}" class="btn btn-secondary">Volver a la página de inicio de sesión</a>

            </div>
        </form>
    </div>
@endsection
