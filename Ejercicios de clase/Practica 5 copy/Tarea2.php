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
    // Si se ha enviado el formulario
    if (isset($_POST['enviar'])) {
        // Recogemos el valor del boton pulsado
        $opcion = $_POST['enviar'];
    }


    // Comprobamos la opcion
    switch ($opcion) {
        case 'Insertar datos':
            $lista = formularioInsercion($lista,$pos);
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
    }

    ?>

    <h1>Lista de la compra</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <ul>
            <li>
                <label for="insertar">Insertar datos</label>
                <input class=\"menuPrincipal\" type='submit' name="enviar" value='Insertar datos'>
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
        <input type="hidden" name="lista" value="<?php implode(",", $array); ?>">
    </form>

</body>

</html>