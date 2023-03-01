@extends("layouts.layout")
@section("title", "Home")
@section("content")
    <!-- Cabecera -->
    <header class="py-3">
        <div class="container">
            <h1 class="mb-0">Acceso a usuarios registrados</h1>
        </div>
    </header>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Formulario -->
    <form action="{{ route('login') }}" method="post" class="container">
        @csrf
        <div class="mb-3">
            <label for="nombre_usuario" class="form-label">Usuario</label>
            <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control">
        </div>
        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>

    <!-- Enlace a la página de registro -->
    <p class="container mt-3">¿No tienes cuenta? <a href="{{ route('register') }}" class="text-primary">Regístrate aquí</a>
    </p>


@endsection
