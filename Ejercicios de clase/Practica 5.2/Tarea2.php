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

    include "funciones.php";


    //si pinchamos en borrar
    if (isset($_REQUEST['borrar'])) {
        //si el nombre no esta vacio
        if (!empty($_POST['nombre'])) {
            //almacenamos el nombre
            $nombre = $_POST['nombre'];
            //comprobamos si el nombre existe en la array
            $si = existe($array, $nombre);
            //si el nombre existe
            if ($si || $si === 0) {
                //borramos el nombre
                unset($array[$si]);
                //borramos la cantidad
                unset($array[$si + 1]);
                //borramos el precio
                unset($array[$si + 2]);
                //mostramos el array
                echo "Elemento borrado de la lista";
            } else {
                //si no existe el nombre
                echo "No se puede borrar ya que el nombre no existe";
            }
        } else {
            //si el nombre esta vacio
            echo "No se puede borrar ya que el nombre esta vacio";
        }
    }

    //si pinchamos en modificar
    if (isset($_REQUEST['modificar'])) {
        //si el nombre no esta vacio
        if (!empty($_POST['nombre'])) {
            //almacenamos el nombre
            $nombre = $_POST['nombre'];
            //comprobamos si el nombre existe en la array
            $si = existe($array, $nombre);
            //almacenamos la cantidad
            $cantidad = $_POST['cantidad'];
            //almacenamos el precio
            $precio = $_POST['precio'];
            //si el nombre existe
            if ($si || $si === 0) {
                //almacenamos cantidad en la posicion 1
                $array[$si + 1] = $cantidad;
                //almacenamos precio en la posicion 2
                $array[$si + 2] = $precio;
                //mostramos el array
                echo "Elemento modificado de la lista";
            } else {
                //si no existe el nombre
                echo "No se puede modificar ya que el nombre no existe";
            }
        } else {
            //si el nombre esta vacio
            echo "No se puede modificar ya que el nombre esta vacio";
        }
    }

    // Si se ha enviado el formulario
    if (isset($_POST['enviar'])) {

        //si la array no esta vacia
        if (!empty($_POST['lista'])) {
            //convertimos los datos en un array
            $array = explode(",", $_POST['lista']);
            //almacenamos los elementos del array
            $pos = count($array);
            echo "1";
        } else {
            //si la array esta vacia la creamos
            $array = array();
            //empezamos por la posicion 0
            $pos = 0;
            echo "2";
        }

        // Si se ha enviado el formulario de insercion
        if ($_POST['enviar'] == 'Insertar producto') {
            if (isset($_REQUEST['enviar']) == 'Insertar producto') {
                
                echo " <form action='Tarea2.php' method='post'>
                <table>
                    <tr>
                        <td><label for='nombre'>Nombre</label></td>
                        <td><input type='text' name='nombre' id='nombre'></td>
                    </tr>
                    <tr>
                        <td> <label for='cantidad'>Cantidad</label></td>
                        <td><input type='number' name='cantidad' id='cantidad'></td>
                    </tr>
                    <tr>
                        <td><label for='precio'>Precio</label></td>
                        <td><input type='number' name='precio' id='precio'></td>
                    </tr>
                </table>
                <br>
                <input type='submit' name='insertar' value='Insertar'>
                <input type='submit' name='volver' value='Volver'>";

                echo "<input type='hidden' name='lista' value='" . implode(",", $array) . "'>";
                echo "</form>";

                if (isset($_REQUEST['insertar']) == "Insertar") {

                    $array = array(
                        $_POST['nombre'],
                        $_POST['cantidad'],
                        $_POST['precio']
                    );
                    // $nombre = $_POST['nombre'];
                    // $cantidad = $_POST['cantidad'];
                    // $precio = $_POST['precio'];
                    // $array = array(insertarDatos($nombre, $cantidad, $precio, $array, $pos));
                    mostrarTabla($array);
                }
            }
        }
        // Si se ha enviado el formulario de modificacion
        if ($_POST['enviar'] == 'Modificar producto') {
            formularioModificar();
            mostrarLista();
        }
        // Si se ha enviado el formulario de eliminacion
        if ($_POST['enviar'] == 'Eliminar producto') {
            formularioEliminar();
            mostrarLista();
        }
        // Si se ha enviado el formulario de mostrar lista
        if ($_POST['enviar'] == 'Mostrar lista') {
            mostrarTabla($array);
        }
    }

    ?>

    <h1>Menu principal</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <ul>
            <li>
                <input class=\"menuPrincipal\" type='submit' name='enviar' value='Insertar producto'>
            </li>
            <li>
                <input class=\"menuPrincipal\" type='submit' name='enviar' value='Modificar producto'>
            </li>
            <li>
                <input class=\"menuPrincipal\" type='submit' name='enviar' value='Eliminar producto'>
            </li>
            <li>
                <input class=\"menuPrincipal\" type='submit' name='enviar' value='Mostrar lista'>
            </li>
        </ul>
    </form>


    <!-- <h1>Introducir datos</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td><label for="nombre">Nombre</label></td>
                <td><input type="text" name="nombre" id="nombre"></td>
            </tr>
            <tr>
                <td> <label for="cantidad">Cantidad</label></td>
                <td><input type="number" name="cantidad" id="cantidad"></td>
            </tr>
            <tr>
                <td><label for="precio">Precio</label></td>
                <td><input type="number" name="precio" id="precio"></td>
            </tr>
        </table>
        <br>
        <input type="hidden" name="lista" value="<?php echo implode(",", $array); ?>">
        <input type="submit" name="insertar" value="Insertar">
        <input type="submit" name="borrar" value="Borrar">
        <input type="submit" name="modificar" value="Modificar">
        <input type="submit" name="mostrar" value="Mostrar">

    </form> -->

</body>

</html>