<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Ejercicio 6</title>
</head>
<body>
    <h1>Desarrollar un programa que permita la carga de 10 valores por teclado y nos muestre posteriormente la suma de los valores ingresados y su promedio</h1>
    <?php 
    
    $contador = 1;
    $valorTotal = 0;
   
    while($contador < 11) {
        $numRandom = rand(1,85);
        printf("<br>Numero %d es: %d",$contador,$numRandom);
        $valorTotal +=$numRandom;
        $contador++;
    }
    printf("<br>Valor total: %d",$valorTotal);
    ?>
    
</body>
</html>