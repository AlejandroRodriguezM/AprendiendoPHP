<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 2</title>
</head>

<body>

    <?php

    include 'funciones.php';
    menuPrincipal();
    // Inicializamos la variable de sesion
    if (!isset($_SESSION['lista'])) {
        $_SESSION['lista'] = array();
    }

    // Si se ha pulsado el boton de insertar

    if (isset($_POST['enviar']) && $_POST['enviar'] == 'Insertar producto') {
        formularioInsertar();
        if (isset($_POST['enviarInsertado']) && $_POST['enviarInsertado'] == 'Insertar') {
            $nombre = $_POST['nombre'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $producto = array('nombre' => $nombre, 'cantidad' => $cantidad, 'precio' => $precio, 'total' => $total);
            array_push($_SESSION['lista'], $producto);
        }
    }

    // Si se ha pulsado el boton de modificar

    if (isset($_POST['enviar']) && $_POST['enviar'] == 'Modificar') {
        formularioModificar($_SESSION['lista']);
        if (isset($_POST['enviarModificado']) && $_POST['enviarModificado'] == 'Modificar') {
            $nombre = $_POST['nombre'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $producto = array('nombre' => $nombre, 'cantidad' => $cantidad, 'precio' => $precio, 'total' => $total);
            array_push($_SESSION['lista'], $producto);
        }
    }

    // Si se ha pulsado el boton de eliminar

    if (isset($_POST['enviar']) && $_POST['enviar'] == 'Eliminar') {
        formularioEliminar($_SESSION['lista']);
        if (isset($_POST['enviarEliminado']) && $_POST['enviarEliminado'] == 'Eliminar') {
            unset($_SESSION['lista'][$_POST['nombre']]);
        }
       
    }

    // Si se ha pulsado el boton de mostrar lista

    if (isset($_POST['enviar']) && $_POST['enviar'] == 'Mostrar lista') {
        echo "<div class='altoDch1'>LISTA DE LA COMPRA</div>";
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Cantidad</th><th>Precio</th><th>Total</th></tr>";
        foreach ($_SESSION['lista'] as $indice => $producto) {
            echo "<tr>";
            echo "<td>" . $producto['nombre'] . "</td>";
            echo "<td>" . $producto['cantidad'] . "</td>";
            echo "<td>" . $producto['precio'] . "</td>";
            echo "<td>" . $producto['total'] . "</td>";
            echo "<td><form action='Tarea2.php' method='post'><input type='hidden' name='indice' value='$indice'><input type='submit' name='enviar' value='Modificar'></form></td>";
            echo "<td><form action='Tarea2.php' method='post'><input type='hidden' name='indice' value='$indice'><input type='submit' name='enviar' value='Eliminar'></form></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<div class='altoDch1'>TOTAL COMPRA: " . Calcular_Precio_Total_Compra($_SESSION['lista']) . "</div>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<input type='submit' name='volver' value='Volver'>";
        echo "</form>";
    }

    // Si se ha pulsado el boton de volver

    if (isset($_POST['volver'])) {
        echo "<form action='Tarea2.php' method='post'>";
        echo "<input type='submit' name='enviar' value='Mostrar lista'>";
        echo "</form>";
    }







    ?>

</body>

</html>