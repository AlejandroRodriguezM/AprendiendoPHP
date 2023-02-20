@extends('layouts.layout')
@section('title', 'Uso directivas')
@section('content')
    <h1>Uso del for</h1>
    @for ($i = 0; $i < 10; $i++)
        <p>El valor actual es: {{ $i }}</p>
    @endfor
    <ul>
        <h1>Uso del foreach</h1>
        @foreach ($users as $user)
            <li>{{ $user }}</li>
        @endforeach
    </ul>
    @php
        $nombres = ['Roberto', 'Juana'];
    @endphp

    <h1>Uso del if</h1>
    @if (empty($nombres))
        <p>"La lista está vacía</p>
    @elseif(count($nombres) > 2)
        <p>Tenemos más de dos usuarios</p>
    @else
        <p>Tenemos uno o dos usuarios</p>
    @endif
    <h1>El uso de unless</h1>
    {{--     es como el if(!empty($nombres)) le pusieramos un !, es decir, si no esta vacio, entonces, muestro el contenido --}}
    @unless(empty($nombres)) {{-- es un condicional invertido --}}
        <ul>
            @foreach ($nombres as $nombre)
                <li>{{ $nombre }}</li>
            @endforeach
        </ul>
    @else
        <p>No hay usuario</p>

        <h1>Usos del forelset</h1>
        @forelse ($users as $user) {{-- es como un foreach, pero con un else, tiene un sino --}}
            <p>{{ $user }}</p>
        @empty
            <p>No hay usuarios</p>
        @endsection
