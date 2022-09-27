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
    
    function precioIva($precio, $iva = 0.18){
        return $precio *= (1+$iva);
    };

    $precio = 20;
    $precioConIva = precioIva($precio);
    printf("El precio con IVA es %.2f",$precioConIva);

    $precio = 20;
    $precioConIva = precioIva($precio,0.21);
    printf("<br>El precio con IVA es %.2f",$precioConIva);
    
    ?>
</body>
</html>