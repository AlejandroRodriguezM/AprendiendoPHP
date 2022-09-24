<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Imprimir los números del 2 al 100 pero de 2 en 2 (2,4,6,8 ....100).</title>
</head>
<body>
    <h1>Imprimir los números del 2 al 100 pero de 2 en 2 (2,4,6,8 ....100).</h1>
    <?php 
    $contador = 2;
    while($contador < 101) {
         if($contador % 2 != 1) {
            printf("%d-", $contador);
         }
         $contador++;
    }
    ?>
    
</body>
</html>