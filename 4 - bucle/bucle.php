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
    function bucle($n) {
        for ($i=0; $i < $n; $i++) {

            echo " $i " +1 ;
        } 
    };
    echo bucle(5);
    ?>
</body>
</html>