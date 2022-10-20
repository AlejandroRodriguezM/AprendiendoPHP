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

    $nombreError = "";
    $apellidoError = "";

    //si la array no esta vacia
    if (!empty($_POST['listaNombres'])) {
        //convertimos los datos en un array
        $array = explode(",", $_POST['listaNombres']);
        //almacenamos los elementos del array
        $pos = count($array);
    } else {
        //si la array esta vacia la creamos
        $array = array();
        //empezamos por la posicion 0
        $pos = 0;
    }

    // asignar valores a las variables

    //si pinchamos en insertar
    if (isset($_REQUEST['enviar'])) {
        if (isset($_REQUEST["nombre"])) { //se puede hacer con empty en lugar de isset
            $nombre = $_REQUEST["nombre"];
        } else {
            $nombreError = "ERROR. Introduce el nombre"; //crea la variable vacía, si el usuario se le olvida el email una vez enviado, el nombre quedará estando en el formulario
        }
        if (isset($_REQUEST["apellido"])) {
            $apellido = $_REQUEST["apellido"];
        } else {
            $apellidoError = "ERROR. Introduce el apellido";
        }
        if (isset($_REQUEST["mail"])) { //se puede hacer con empty en lugar de isset
            $mail = $_REQUEST["mail"];
        } else {
            $nombreError = "ERROR. Introduce el nombre"; //crea la variable vacía, si el usuario se le olvida el email una vez enviado, el nombre quedará estando en el formulario
        }
        if (isset($_REQUEST["nacimiento"])) {
            $nacimiento = $_REQUEST["nacimiento"];
        } else {
            $apellidoError = "ERROR. Introduce el apellido";
        }
        if (isset($_REQUEST["telefono"])) {
            $telefono = $_REQUEST["telefono"];
        } else {
            $apellidoError = "ERROR. Introduce el apellido";
        }

        //si el nombre no esta vacio
        if (!empty($_POST['nombre']) && !empty($_POST['apellido'])) {
            //almacenamos el nombre en la array
            $array['nombre'] = $nombre;
            //almacenamos el apellido
            $array['apellido'] = $apellido;
            //almacenamos el nombre en la array
            $array['mail'] = $mail;
            //almacenamos el apellido
            $array['nacimiento'] = $nacimiento;
            //almacenamos el nombre en la array
            $array['telefono'] = $telefono;

            mostrarTabla($array);
        }
    }

    function mostrarTabla($array)
    {
        echo "<table>";
        foreach ($array as $datos => $value)
        {
            echo "<tr class=\"encabezado\"><td class=\"contenido\">" . $datos . "</td><td class=\"contenido\">" . $value . "</td></td></tr>";
        }
        echo "</table>";
    }

    ?>

    <form action='Ejercicio1.php' method='post'>
        <table>
            <ul>
                <li>
                    <label for='nombre'>Escribe tu nombre</label>
                    <input type='text' name='nombre' value=''>
                </li>

                <li>
                    <label for='apellido'>Escribe tu apellido</label>
                    <input type='text' name='apellido' value=''>
                </li>

                <li>
                    <label for='apellido'>Escribe tu mail</label>
                    <input type='text' name='mail' value=''>
                </li>

                <li>
                    <label for='apellido'>Escribe tu Fecha de nacimiento</label>
                    <input type='text' name='nacimiento' value=''>
                </li>

                <li>
                    <label for='apellido'>Escribe tu telefono</label>
                    <input type='text' name='telefono' value=''>
                </li>
            </ul>
            <input type="hidden" name="listaNombres" value="<?php echo implode(",", $array); ?>">
            <button type="submit" name="enviar">Enviar datos</button>

        </table>
    </form>
</body>

</html>