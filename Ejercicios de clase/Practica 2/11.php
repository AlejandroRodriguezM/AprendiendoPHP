<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Ejercicio 11</title>
</head>

<body>
    <h1> Se realiza la carga de 10 valores enteros por teclado. Se desea conocer:
        <br>a) La cantidad de valores ingresados negativos.
        <br>b) La cantidad de valores ingresados positivos.
        <br>c) La cantidad de múltiplos de 15.
        <br>d) El valor acumulado de los números ingresados que son pares.
    </h1>
    <?php

    $numNega = 0;
    $numPosi = 0;
    $multiplos15 = 0;
    $sumaPares = 0;

    for ($i = 1; $i <= 10; $i++) {
        $numRandom = rand(-10, 10);

        if ($numRandom < 0) {
            $numNega++;
        }
        else {
            $numPosi++;
        }
        if($numRandom % 15 != 1) {
            $multiplos15++;
        }
        if($numRandom % 2 != 1) {
            $sumaPares += $numRandom;
        }
    }
    printf("Numeros negativos: %d 
    <br>Numero positivos: %d 
    <br>Multiples de 15: %d 
    <br>Suma de pares: %d",
    $numNega,$numPosi,$multiplos15,$sumaPares);
    ?>

</body>

</html>