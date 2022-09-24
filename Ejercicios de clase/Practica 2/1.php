<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title> Imprimir los números del 1 al 500</title>
</head>
<body>
    <h1>Imprimir los números del 1 al 500</h1>
    <?php 
    $contador = 1;
    while($contador < 501) {
        printf("%d - ",$contador);
        $contador++;
    }
    ?>
    
</body>
</html>