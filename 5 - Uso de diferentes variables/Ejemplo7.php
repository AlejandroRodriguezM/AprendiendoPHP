<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Document</title>
</head>

<body>
    <h1>Uso de printf</h1>
    <p>
        <?php
        $asignatura = "DWES";
        $modulo = "DAW";
        $curso = 2;
        printf("%s es un módulo de %d de %s", $asignatura, $curso, $modulo);
        ?>
    </p>

</body>

</html>