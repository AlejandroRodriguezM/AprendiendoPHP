@extends('layouts.layout')
@section('title',"Uso directivas")
@section('content')
    <h1>Uso del for</h1>
    @for($i=0;$i<10;$i++)
        <p>El valor actual es:{{$i}}</p>
    @endfor

    <h1>Uso del foreach</h1>
    @foreach($users as $user)
        <p>El valor actual es:{{$user}}</p>
    @endforeach


@endsection