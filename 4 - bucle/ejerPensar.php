<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estilo/style.css">
</head>

<body>
    <?php

    echo "<h1>Ejercicio 1</h1>";
    echo "<div>";
    $numero = rand(1, 1000000);
    $miNumero = $numero;
    $cifras = 0;
    while ($numero >= 1) {
        $numero /= 10;
        $cifras++;
    }

    printf("el numero %d tiene %d cifras", $miNumero, $cifras);

    echo "</div>";

    echo "<h1>Ejercicio 2</h1>";
    echo "<div>";
    $nota = rand(1, 10);
    $mejor = $nota;
    $peor = $nota;

    for ($i = 1; $i <= 10; $i++) {
        $nota = rand(1, 10);

        if ($nota > $mejor) {
            $mejor = $nota;
        }

        if ($nota < $peor) {
            $peor = $nota;
        }
    }

    printf("Mejor nota: %d <br>", $mejor);
    printf("Peor nota: %d", $peor);
    echo "</div>";


    ?>

</body>

</html>