<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Ejercicio 2 por Alejandro Rodriguez Mena</title>
</head>

<body>
    <?php
    include "funciones.php";

    //Numero random entre 1 y 25, que calculara el tamaño de las filas y columnas
    $numeroRandom = geradorRandom();
    $filas =  $numeroRandom;
    $columnas =  $numeroRandom;

    echo "<table border=1>";
    echo "<td class='fila'>X</td>";

    for ($i = 0; $i <= $filas - 1; $i++) {
        echo "<td class='fila'>" . $i . "</td>";
    }
    echo "</tr>";

    for ($i = 0; $i <= $filas - 1; $i++) {
        echo "<tr>";
        echo "<td class='columna'>" . $i . "</td>";
        for ($j = 0; $j <= $columnas - 1; $j++) {

            echo "<td>" . $i * $j . "</td>";
        }
        echo "</tr>";
    }


    ?>
</body>

</html>