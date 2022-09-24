<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Ejercicio 10</title>
</head>
<body>
    <h1> Confeccionar un programa que permita ingresar un valor del 1 al 10 y nos muestre la tabla de multiplicar del mismo</h1>
    <?php 

    $numRandom = rand(1,10);
    for ($i = 1; $i <= 10; $i++) {
        $resultado = $numRandom * $i;
        print("$numRandom x $i = $resultado <br>");
    }
    ?>
    
</body>
</html>