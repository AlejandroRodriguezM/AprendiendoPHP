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

    // A partir de un número n (ej: n=5) Visualizar. 0 0 0 0 1  0 0 0 1 2  0 0 1 2 3  0 1 2 3 4  1 2 3 4 5

    $n = 5;
    $array = array();

    for ($i = 1; $i <= $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($j < $n - $i - 1) {
                echo "0 ";
            } else {
                echo $j - $n + $i + 1 . " ";
            }
        }
        echo "<br>";
    }
    ?>
</body>

</html>