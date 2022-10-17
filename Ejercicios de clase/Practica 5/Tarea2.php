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

    // Si se ha enviado el formulario
    if (isset($_POST['enviar'])) {
        // Si se ha enviado el formulario de insercion
        if ($_POST['enviar'] == 'Insertar producto') {
            formularioInsertar();
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
            mostrarLista();
        }
    } else {
        menuPrincipal();
    }
    ?>
</body>

</html>