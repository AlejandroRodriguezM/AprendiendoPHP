<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    // A partir de una base y exponente, mediante la acumulación de productos, calcula la potencia utilizando la instrucción for.

    $base = 2;
    $exponente = 3;

    $resultado = 1;

    for ($i = 0; $i < $exponente; $i++) {
        $resultado *= $base;
    }

    echo $resultado;
    
    
    
    
    
    ?>
    
</body>
</html>