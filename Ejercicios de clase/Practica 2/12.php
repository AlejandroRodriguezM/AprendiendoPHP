<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Ejercicio 12</title>
</head>

<body>
    <h1> Realizar un programa que lea un número y nos diga cuantas cifras tiene el número.</h1>
    <?php

    $numRandom = rand(1, 100000);
    $numDigitos = 0;
    print($numRandom);
    while ($numRandom > 1) {
       $numRandom /= 10;
       $numDigitos++;
        
    }
    print("<br>Tiene: $numDigitos");
    ?>

</body>

</html>