<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Ejercicio 7</title>
</head>
<body>
    <h1>Escribir un programa que solicite ingresar 10 notas de alumnos y nos informe cuántos tienen notas mayores o iguales a 7 y cuántos menores</h1>
    <?php

    $notasA = 0;
    $notasB = 0;

    $contador = 1;
    while($contador < 11) {
        $numRandom = rand(0,10);

        if($numRandom > 6) {
            printf("<br>Nota alta: %d",$numRandom);
            $notasA++;
        }
        else {
            printf("<br>Nota baja: %d",$numRandom);
            $notasB++;
        }
        $contador++;
    }
    printf("<br>El numero de notas mayor o igual a 7 han sido: %d<br>Las notas menores de 7 han sido: %d",$notasA,$notasB);




    ?>
    
</body>
</html>