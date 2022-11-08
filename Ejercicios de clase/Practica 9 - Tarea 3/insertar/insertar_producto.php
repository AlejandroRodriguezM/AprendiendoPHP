<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <title>Document</title>
</head>

<body>
    <?php
    include_once '../funciones.php';
    //insertar datos
    if (isset($_POST['cr'])) {
        if (!empty($_POST['referencia']) && !empty($_POST['nombre']) && !empty($_POST['descripcion'] && !empty($_POST['precio']) && !empty($_POST['descuento']))) {
            $referencia = $_POST['referencia'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $descuento = $_POST['descuento'];
            $query = "select * from productos";
            $identificador = "referencia";
            if (checkID($referencia,$query,$identificador)) {
                $base = "ventas_comerciales";
                $consulta = "INSERT INTO productos(referencia, nombre, descripcion, precio, descuento) VALUES('$referencia', '$nombre', '$descripcion', '$precio', '$descuento')";
                operacionTransaccion($query, $base);
                header("Location:insertar_producto.php");
            } else {
                echo "El codigo introducido ya existe";
            }
        } else {
            echo "No se han introducido todos los datos";
        }
    }

    if (isset($_POST['back'])) {
        header("Location:../insercion.php");
    }
    // //Listado de datos
    $conexion = conectar("ventas_comerciales");
    $query = "select * from productos";
    $registros = $conexion->query($query) or die($conexion->error);
    ?>
    <div class="contenedor">
        <header onclick="location.href='../index.php';" style="cursor: pointer;">
            <h1 id="inicio">Ventas comerciales</h1>
        </header>
        <nav>
            <div>
                <table class="botonesMenu">
                    <tr>
                        <td class="botonesMenu">
                            <form action="../consulta.php" method="post">
                                <input class="menu" type="submit" value="consulta">
                            </form>
                        </td>
                        <td class="botonesMenu">
                            <form action="../insercion.php" method="post">
                                <input class="menu" type="submit" value="insercion">
                            </form>
                        </td>
                        <td class="botonesMenu">
                            <form action="../modificacion.php" method="post">
                                <input class="menu" type="submit" value="modificacion">
                            </form>
                        <td class="botonesMenu">
                            <form action="../eliminacion.php" method="post">
                                <input class="menu" type="submit" value="eliminacion">
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </nav>
    </div>
    <h1>Insertando producto<span class="subtitulo"></span></h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table width="50%" border="0" align="center">
            <tr>
                <td class="primera_fila">Referencia</td>
                <td class="primera_fila">Nombre</td>
                <td class="primera_fila">Descripcion</td>
                <td class="primera_fila">Precio</td>
                <td class="primera_fila">Descuento</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
            </tr>
            <?php
            $row = $registros->fetch();
            while ($row != null) {
            ?>
                <tr>
                    <td><?php echo $row['referencia']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['precio']; ?></td>
                    <td><?php echo $row['descuento']; ?></td>
                </tr>
            <?php
                $row = $registros->fetch();
            }
            $conexion = null;
            ?>
            <tr>
                <td><input type="text" name="referencia" size="10" class="centrado"></td>
                <td><input type="text" name="nombre" size="10" class="centrado"></td>
                <td><input type="text" name="descripcion" size="10" class="centrado"></td>
                <td><input type="text" name="precio" size="10" class="centrado"></td>
                <td><input type="text" name="descuento" size="10" class="centrado"></td>
                <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
                <td class='bot'><input type='submit' name='back' id='back' value='Volver'></td>
            </tr>
        </table>

    </form>

</body>

</html>