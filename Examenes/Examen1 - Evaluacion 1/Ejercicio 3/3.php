<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 por Alejandro Rodriguez Mena</title>
</head>

<body>
    <?php
    include "funciones.php";

    $billetes = array(500, 200, 100, 50, 20, 10, 5);
    $monedas = array(2, 1);

    $importe = geradorRandom();

    $billetesDescomp = array();
    $monedasDescomp = array();
    echo "<p>El dinero a dividir es: $importe</p>";

    foreach ($billetes as $billete) {
        $billetesDescomp[$billete] = intdiv($importe, $billete);
        $importe = $importe % $billete;
    }

    foreach ($monedas as $moneda) {
        $monedasDescomp[$moneda] = intdiv($importe, $moneda);
        $importe = $importe % $moneda;
    }

    echo "<p>Billetes:</p>";
    foreach ($billetesDescomp as $key => $value) {
        if ($value > 0) {
            echo $value . " billete/s de " . $key . "€<br>";
        }
    }

    echo "<p>Monedas:</p>";
    foreach ($monedasDescomp as $key => $value) {
        if ($value > 0) {
            echo $value . " moneda/s de " . $key . "€<br>";
        }
    }


    ?>

</body>

</html>