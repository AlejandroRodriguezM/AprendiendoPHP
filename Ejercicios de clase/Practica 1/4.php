<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title> Almacena el día de hoy y si es menor o igual a 10 visualizará sitio activo y sino sitio fuera de servicio</title>
</head>

<body>
    <p>
        <?php

        $dia = date("d");
        $control = " Sitio activo ";

        if ($dia <= 10) {
            $control = "Sitio fuera de servicio";
        }
        
        printf("Estado del servidor: %s",$control);
        ?>
    </p>
</body>

</html>