<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset ('css/estilos.css')}}"> --}}
    <title>@yield ('title')</title>
    <style>
        .active{
        color:red;
        font-weight: bold;
        }
    </style>
</head>

<body>
    @include('layouts.partials.header')
    <header>
        <h1>Este es el layout</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home')}}" class="{{ request()->routeIs('home') ? 'active' : ''}}">Home</a></li>
                <li><a href="{{ route('cursos.index')}}" class="{{ request()->routeIs('cursos.*') ? 'active' : ''}}">Cursos</a></li>
                <li><a href="{{ route('cursos.create')}}" class="{{ request()->routeIs('cursos.create') ? 'active' : ''}}">Crear curso</a></li>
                <li><a href="{{ route('cursos.usos')}}" class="{{ request()->routeIs('cursos.usos') ? 'active' : ''}}">Uso directivas</a></li>
                <li><a href="{{ route('nosotros')}}" class="{{ request()->routeIs('nosotros') ? 'active' : ''}}">Nosotros</a></li>


            </ul>
        </nav>
    </header>
    @yield('content')
</body>

</html>
