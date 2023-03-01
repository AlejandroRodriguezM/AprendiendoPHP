@extends('layouts.layout')
@section('title', 'Home')
@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4">Anécdotas de Elvis</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/elvis1.jpg') }}" alt="Elvis 1">
                    <div class="card-body">
                        <p class="card-text">Elvis Presley se compró su primera guitarra con el dinero que le dio su madre
                            para comprar ropa.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/elvis2.jpg') }}" alt="Elvis 2">
                    <div class="card-body">
                        <p class="card-text">Cuando Elvis fue al programa de televisión "The Ed Sullivan Show" por primera
                            vez, tuvieron que grabarlo desde la cintura hacia arriba porque los movimientos de sus caderas
                            eran considerados demasiado sexuales.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/elvis3.jpg') }}" alt="Elvis 3">
                    <div class="card-body">
                        <p class="card-text">Elvis se encontraba en el baño cuando su casa en Graceland fue allanada por la
                            policía. Pensó que los intrusos eran sus amigos jugándole una broma y salió del baño saludando
                            con un rollito de papel higiénico en la mano.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
