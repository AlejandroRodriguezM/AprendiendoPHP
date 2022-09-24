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

    $num = rand(1,100000);
    $contador = 0;
    while($num>1) {
       $num%=10;
       $contador++;
    } ;
    print("Tiene: $contador cifras")

    ?>
</body>
</html>