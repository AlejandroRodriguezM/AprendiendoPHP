@extends('layouts.layout')
@section('title', 'Discografia')
@section('content')
    <div class="container my-5">
        <h2>Discografía de Elvis Presley</h2>

        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            <div class="col">
                <div class="card">
                    <img src="https://vinylroute.com/wp-content/uploads/2021/02/Elvis.jpg"
                        class="card-img-top" alt="Elvis Presley (1956)">
                    <div class="card-body">
                        <h5 class="card-title">Elvis Presley (1956)</h5>
                        <p class="card-text">Álbum debut de Elvis Presley, que incluye canciones como "Blue Suede Shoes" y
                            "Heartbreak Hotel".</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="https://www.audiokat.com/recursos/albums/004/03834g.jpg"
                        class="card-img-top" alt="Loving You (1957)">
                    <div class="card-body">
                        <h5 class="card-title">Loving You (1957)</h5>
                        <p class="card-text">Banda sonora de la película del mismo nombre, que incluye canciones como
                            "Loving You" y "Teddy Bear".</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="https://cdn.shopify.com/s/files/1/0117/4483/7728/products/PRESLEYELV50000000EL_800x.png?v=1612802727"
                        class="card-img-top" alt="Elvis' Gold Records Volume 2 (1959)">
                    <div class="card-body">
                        <h5 class="card-title">Elvis' Gold Records Volume 2 (1959)</h5>
                        <p class="card-text">Compilación de algunos de los mayores éxitos de Elvis Presley, como "Don't Be
                            Cruel" y "Jailhouse Rock".</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/en/b/bf/ElvisPresleySomethingForEverybodyLPCover.jpg"
                        class="card-img-top" alt="Something for Everybody (1961)">
                    <div class="card-body">
                        <h5 class="card-title">Something for Everybody (1961)</h5>
                        <p class="card-text">Álbum de estudio que incluye canciones como "There's Always Me" y "I Want You
                            With Me".</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
