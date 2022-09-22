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
        $dia = date("d");
        $mes = date("m");
        $anyo = date("Y");

        //echo "Fecha actual:" . $día . "-" . $mes . "-" . $anyo;
        printf("Fecha actual: %d-%d-%d", $dia, $mes, $anyo);

        ?>
    </p>

</body>

</html>