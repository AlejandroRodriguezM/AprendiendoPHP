<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Ejercicio 13</title>
</head>

<body>
    <h1> Realizar un programa que lea las notas de 10 alumnos y nos muestre la mejor nota y la peor nota.</h1>
    <?php

    $nota = rand(1, 10);
    $mejorNota = 0;
    $peorNota = $nota;
   
    for ($i = 0; $i < 10; $i++) { 
        $nota = rand(1, 10);

        if($nota > $mejorNota) {
            $mejorNota = $nota;
        }

        if($nota < $peorNota) {
            $peorNota = $nota;
        }
    }

    printf("Mejor nota: %d <br>Peor nota: %d",$mejorNota,$peorNota);
    ?>

</body>

</html>