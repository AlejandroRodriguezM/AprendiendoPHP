<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Ejercicio 1 por Alejandro Rodriguez Mena</title>
</head>

<body>

    <?php
    include "funciones.php";

    //creamos el array, en caso de que no exista lo creamos vacio y lo inicializamos a 0 para que no de error al sumarle 4 en la funcion agregar
    if (!empty($_POST['lista'])) {
        $array = explode(",", $_POST['lista']);
        $pos = count($array);
        $idPersona = count($array) - 2;
    } else {
        $array = array();
        $pos = 0;
        $idPersona = 1;
    }

    //Si he pulsado ingresar llamamos a la funcion agregar y le pasamos los datos del formulario y la posicion en la que se insertaran los datos en el array
    if (isset($_POST["ingresar"])) {
        $id = $idPersona;
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $direccion = $_POST["direccion"];
        if(($nombre != "") && ($apellido != "") && ( $direccion != "")){
            $array = agregar($array, $id, $nombre, $apellido, $direccion, $pos);
        }
        else{
            echo "<p>ERROR. Comprueba los campos que esten rellenos</p>";
        }

    }
    ?>

    <form name="formulario" action="" method="post">
            <table>
                <tr>
                    <td class="cabecera">ID</td>
                    <td class="cabecera">Nombre</td>
                    <td class="cabecera">Apellido</td>
                    <td class="cabecera">Direccion</td>
                    <?php mostrarTabla($array); ?>
                </tr>
                <tr>
                    <td class="datos"></td>
                    <td class="datos"><input type="text" name="nombre" value=""></td>
                    <td class="datos"><input type="text" name="apellido" value=""></td>
                    <td class="datos"><input type="text" name="direccion" value=""></td>
                    </td>
                    <td class ="ingresar" colspan="2">
                    <input name="lista" type="hidden" value="<?php if (isset($array)) echo implode(",", $array); ?>">
                    <input type="submit" name="ingresar" value="Insertar">
                </td>
                </tr>

            </table>
    </form>

</body>

</html>