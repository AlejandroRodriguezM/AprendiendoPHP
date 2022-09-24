<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Ejercicio 4</title>
</head>
<body>
    <h1> Codificar un programa que solicite la carga de un valor positivo 
        y nos muestre desde 1 hasta el valor ingresado de uno en uno. Ejemplo: 
        Si ingresamos 30 se debe mostrar en pantalla los números del 1 al 30.
    </h1>

    <?php 
    
    $numRandom = rand(1,100);
    $i = 0;
    print("El numero es $numRandom<br>");
    while($i <= $numRandom) {
        printf("%d - ",$i);
        $i++;
    }

    ?>

</body>
</html>