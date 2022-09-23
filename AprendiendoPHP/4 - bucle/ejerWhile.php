<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estilo/style.css">
</head>

<body>
    <?php
    echo "<h1>Ejercicio 1</h1>";
    $i = 0;
    while ($i <= 500) {
        printf("%d-", $i);
        $i++;
    }

    //con un for:
    /*   for ($i = 1; $i <= 500; $i++) {
        printf("%d-", $i);
    }*/

    echo "<h1>Ejercicio 2</h1>";
    $i = 50;
    while ($i <= 100) {
        printf("%d-", $i);
        $i++;
    }

    echo "<h1>Ejercicio 3</h1>";
    $i = -50;
    while ($i <= 0) {
        printf("%d-", $i);
        $i++;
    }

    echo "<h1>Ejercicio 4</h1>";
    $i = 2;
    while ($i <= 100) {
        printf("%d-", $i);
        $i += 2;
    }

    echo "<h1>Ejercicio 5</h1>";
    $i = 1;
    while ($i <= rand(1, 100)) {
        printf("%d-", $i);
        $i++;
    }

    /* otra forma de hacerlo:
        $i = 1;
        $aleatorio=rand(1, 100);
    while ($i <= aleatorio)) {
        printf("%d-", $i);
        $i++;
    }*/

    echo "<h1>Ejercicio 6</h1>";
    $i = 1;
    $suma = 0.0;

    while ($i <= 10) {
        $aleatorio = rand(1, 100);
        $suma += $aleatorio;
        $i++;
    }

    $media = $suma / 10.0;
    printf("la suma es %d y la media es %.2f", $suma, $media);


    echo "<h1>Ejercicio 7</h1>";
    $i = 1;
    $super7 = 0;
    $infer7 = 0;

    while ($i <= 10) {
        $nota = rand(1, 10);
        echo "$nota -";
        if ($nota >= 7) {
            $super7++;
        } else {
            $infer7++;
        }
        $i++;
    }

    printf("<br>Notas inferiores a 7: %d<br> Notas superiores a 7: %d", $infer7, $super7);


    ?>

</body>

</html>