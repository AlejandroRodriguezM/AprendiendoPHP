<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset ('css/estilos.css')}}"> --}}
    <title>@yield ('title')</title>
</head>

<body>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('cursos.index') }}">Cursos</a></li>
        <li><a href="{{ route('cursos.create') }}">Creacion</a></li>
        <li><a href="{{ route('cursos.usos') }}">Usos varios</a></li>
    </ul>

    @yield ('content')
</body>

</html>
