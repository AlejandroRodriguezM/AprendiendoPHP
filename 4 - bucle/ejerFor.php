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
    for ($i = 1; $i <= 100; $i++) {
        printf("%d-", $i);
    }

    echo "<h1>Ejercicio 2</h1>";
    for ($i = 20; $i <= 30; $i++) {
        printf("%d-", $i);
    }

    echo "<h1>Ejercicio 3</h1>";
    $numero = rand(1, 10);
    for ($i = 1; $i <= 10; $i++) {
        $resultado = $i * $numero;
        printf("%d x %d = %d<br>", $numero, $i, $resultado);
    }

    echo "<h1>Ejercicio 4</h1>";
    $positivo = 0;
    $negativo = 0;
    $mul15 = 0;
    $sumaPares = 0;

    for ($i = 1; $i <= 10; $i++) {
        $numero = rand(-100, 100);
        //para mostrarlo por pantalla
        printf("%d ", $numero);

        if ($numero >= 0) {
            $positivo++;
        } else {
            $negativo++;
        }

        if ($numero % 15 == 0) {
            $mul15++;
        }

        if ($numero % 2 == 0) {
            $sumaPares += $numero;
        }
    }

    printf("<br>Cantidad de positivos: %d", $positivo);
    printf("<br>Cantidad de negativos: %d ", $negativo);
    printf("<br>Multiplos de 15: %d ", $mul15);
    printf("<br>Suma de todos los pares: %d ", $sumaPares);

    ?>

</body>

</html>