<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Imprimir los números del 50 al 100</title>
</head>
<body>
    <h1>Imprimir los números del 50 al 100</h1>
    <?php 
    
    $contador = 50;
    while($contador < 101) {
        printf("%d - ",$contador);
        $contador++;
    }
    ?>
    
</body>
</html>