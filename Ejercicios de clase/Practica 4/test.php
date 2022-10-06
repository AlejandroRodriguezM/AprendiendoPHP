<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    pedir nombre y dni por input text y mostrar una tabla con el nombre y el dni y guardarlo dentro de un array

    <?php
    $datos = array();
    if (isset($_REQUEST['enviar'])) {
        $nombre = $_REQUEST['nombre'];
        $dni = $_REQUEST['dni'];
        $datos[] = $nombre;
        $datos[] = $dni;
    }
    ?>

    <form action="" method="post">
        <table>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="nombre"></td>
            </tr>
            <tr>
                <td>DNI</td>
                <td><input type="text" name="dni"></td>
            </tr>
            <tr>
                <td><input type="submit" name="enviar" value="enviar"></td>
            </tr>
        </table>
    </form>

    <table>
        <tr>
            <td>Nombre</td>
            <td>DNI</td>
        </tr>
        <tr>
            <td><?php echo $datos[0] ?></td>
            <td><?php echo $datos[1] ?></td>
        </tr>
    </table>

    


</body>
</html>