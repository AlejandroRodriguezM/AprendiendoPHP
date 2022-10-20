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
    
    // Rellena un array con 50 números aleatorios comprendidos entre el 0 y el 99, y luego muéstralo en una lista ordenada. Para crear un número aleatorio, utiliza la función rand(inicio, fin). Por ejemplo:

    $array = array();

    for ($i = 0; $i < 50; $i++) {
        $array[$i] = rand(0, 99);
    }

    sort($array);

    foreach ($array as $value) {
        echo $value . "<br>";
    }
    
    
    
    
    
    
    ?>
    
</body>
</html>