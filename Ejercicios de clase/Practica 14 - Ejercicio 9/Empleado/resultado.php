<?php

require_once "php/Persona.php";
require_once "php/Empleado.php";
session_start();

?>
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
    if ($_POST) {
        //retrieve empleado object from session
        $empleado = $_SESSION['empleado'];
        //display empleado object
        echo $empleado->toHtml($empleado);
        session_destroy();
    }

    ?>

</body>

</html>