@extends('layouts.layout')
@section('title', 'Discografia')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Biografía de Elvis Presley</h2>
                <p class="lead">Elvis Aaron Presley (Tupelo, Misisipi, Estados Unidos; 8 de enero de 1935 - Memphis,
                    Tennessee, Estados Unidos; 16 de agosto de 1977) fue uno de los cantantes estadounidenses más populares
                    del siglo XX y está considerado como un ícono cultural y una leyenda de la música. Fue apodado como "El
                    Rey del Rock and Roll" y su influencia en la música y la cultura popular es incuestionable.</p>
                <p>Comenzó su carrera musical en 1954 en Sun Records en Memphis. Su estilo musical era una mezcla de blues,
                    gospel y country. En poco tiempo, se convirtió en una sensación musical en todo el país y rápidamente se
                    convirtió en un icono cultural y una figura influyente en la música popular. A lo largo de su carrera,
                    lanzó numerosos éxitos y su música sigue siendo popular en la actualidad.</p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/elvis3.jpg') }}"
                    alt="Elvis Presley" class="img-fluid rounded">
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/elvis1.jpg') }}"
                    alt="Elvis Presley" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <h3>Elvis y su influencia cultural</h3>
                <p>Además de su éxito musical, Elvis también tuvo un gran impacto en la cultura popular de su época. Su
                    estilo de actuación en el escenario y su carisma personal le ganaron el apodo de "El Rey del Rock and
                    Roll". Su imagen y estilo influyeron en la moda de la época y se convirtió en un modelo a seguir para
                    muchos jóvenes de su tiempo.</p>
                <p>Además de su carrera musical, Elvis también actuó en numerosas películas y programas de televisión. Su
                    imagen y su música se convirtieron en un fenómeno cultural en todo el mundo y sigue siendo un ícono
                    cultural hasta el día de hoy.</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h3>La muerte de Elvis</h3>
                <p>Elvis murió trágicamente en su casa de Graceland en Memphis, Tennessee, el 16 dede agosto de 1977. Tenía
                    solo 42 años. La causa oficial de su muerte fue un ataque cardíaco, pero su legado en la música y la
                    cultura popular continúa hasta el día de hoy.</p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/elvis2.jpg') }}"
                    alt="Elvis Presley" class="img-fluid rounded">
            </div>
        </div>
    </div>

@endsection
