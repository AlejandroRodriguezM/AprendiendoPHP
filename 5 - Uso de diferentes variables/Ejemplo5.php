<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Document</title>
</head>

<body>

    <?php

    $texto = "DAWES";
    $numero = 5;
    $numReal = 3.5;
    $existe = true;

    printf("Variable encadena:%s<br>Variable entera:%d<br>Variable real:%f", $texto, $numero, $numReal);
    if ($existe) {
        print "<br>Variable booleana true";
    } else {
        print "<br>Variable booleano false";
    }
    ?>

</body>

</html>