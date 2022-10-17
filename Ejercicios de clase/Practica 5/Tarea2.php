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

    include "funciones.php";
    //si la array no esta vacia
    if (!empty($_POST['lista'])) {
        //convertimos los datos en un array
        $array = explode(",", $_POST['lista']);
        //almacenamos los elementos del array
        $pos = count($array);
    } else {
        //si la array esta vacia la creamos
        $array = array();
        //empezamos por la posicion 0
        $pos = 0;
    }

    //si pinchamos en insertar
    if (isset($_REQUEST['insertar'])) {
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
            //si el nombre no existe

            if ($si === false) {
                //almacenamos el nombre en la array
                $array[$pos] = $nombre;
                //almacenamos la cantidad en la array
                $array[$pos + 1] = $cantidad;
                //almacenamos el precio en la array
                $array[$pos + 2] = $precio;
                //aumentamos la posicion
                $pos += 3;
            } else {
                //si el nombre existe almacenamos y suma a la existente cantidad en la array
                $array[$si + 1] += $cantidad;
            }
            mostrarTabla($array);
        } else {
            //si el nombre esta vacio
            echo "No se puede añadir ya que el nombre esta vacio";
        }
    }

    if (isset($_REQUEST['mostrar'])) {
        mostrarTabla($array);
    }

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

    ?>
    
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="menu">
        <h1>Introducir datos</h1>
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
            </div>
        </form>
   

</body>

</html>