<?php

include_once 'Empleado.php';

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

    if (isset($_POST['enviar'])) {
        $nombre = $_POST['name'];
        $apellido = $_POST['apellido'];
        $sueldo = $_POST['sueldo'];
        $telefono = $_POST['telefono'];
        if (!empty($nombre) && !empty($apellido) && !empty($sueldo) && !empty($telefono)) {
            $empleado = new Empleado();
            $empleado->setNombre($nombre);
            $empleado->setApellido($apellido);
            $empleado->setSueldo($sueldo);
            $empleado->setTelefono($telefono);
        } else {
            echo "No se han introducido todos los datos";
        }
    }



    ?>

    <form action="" method="POST">

        <label for="name"></label>
        <input type="text" name="name" id="name" placeholder="Nombre">
        <label for="apellido"></label>
        <input type="text" name="apellido" id="apellido" placeholder="Apellido">
        <label for="sueldo"></label>
        <input type="number" name="sueldo" id="sueldo" placeholder="Sueldo">
        <label for="telefono"></label>
        <input type="number" name="telefono" id="telefono" placeholder="telefono">
        <input type="submit" value="enviar" name="enviar">
        <input type="submit" value="mostrar telefonos" name="mostrar_telefonos">
        <input type="submit" value="mostrar Todo" name="mostrar_todo">
        <input type="submit" value="Borrar" name="borrar">

    </form>
</body>

</html>