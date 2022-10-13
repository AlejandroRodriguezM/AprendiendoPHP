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

    // Inicializamos la variable opcion
    $opcion = "";
    $lista = array();

    // Si se ha enviado el formulario
    if (isset($_POST['enviar'])) {
        // Recogemos el valor del boton pulsado
        $opcion = $_POST['enviar'];
    }
    // Comprobamos la opcion
    switch ($opcion) {
        case 'Insertar producto':
            formularioInsercion();
            // Recogemos los datos del formulario
            if (isset($_REQUEST['enviarInsertado'])) {
                $nombre = $_REQUEST['nombre'];
                $cantidad = $_REQUEST['cantidad'];
                $precio = $_REQUEST['precio'];
                // Creamos el array con los datos del producto
                $lista[] = array(
                    'nombre' => $nombre,
                    'cantidad' => $cantidad,
                    'precio' => $precio,
                );
                // Mostramos el menu principal
                menuPrincipal();
            }
            break;
        case 'Modificar producto':
            // Mostramos el formulario de modificacion
            formularioModificacion($lista);
            break;
        case 'Eliminar producto':
            // Mostramos el formulario de eliminacion
            formularioEliminacion($lista);
            break;
        case 'Mostrar lista':
            // Mostramos la lista de la compra
            mostrarListaCompra($lista);
            break;
        default:
            // Mostramos el menu principal
            menuPrincipal();
            break;
    }



    ?>

</body>

</html>