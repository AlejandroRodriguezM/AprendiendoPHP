<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Test funciones</title>
</head>

<body>
    <p>
        <?php

        include "Funciones.php";
        $dia = rand(1, 31);
        $mes = rand(1, 12);
        $anio = rand(1000, 3000);

        fechaActual($dia, $mes, $anio);
        
        ?>
    </p>

</body>

</html>