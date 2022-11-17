<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="shortcut icon" href="../img/ico.png">
    <title>Insertando producto</title>
</head>

<body>
    <?php
    include_once '../funciones.php';
    $mensaje = "";
    /**
     * Permite insertar un producto en la base de datos, siempre que los datos esten introducidos correctamente
     */
    if (isset($_POST['cr'])) {
        if (!empty($_POST['referencia']) && !empty($_POST['nombre']) && !empty($_POST['precio']) && !empty($_POST['descuento'])) {
            $referencia = $_POST['referencia'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            if (empty($descripcion)) {
                $descripcion = "Sin descripción";
            }
            $precio = $_POST['precio'];
            if ($precio == 0) {
                $precio = 1;
            }

            $descuento = $_POST['descuento'];
            if ($descuento == 0) {
                $descuento = 1;
            }

            $query = "select referencia from productos where referencia = '$referencia'";
            if (checkID($query)) {
                $base = "ventas_comerciales";
                $sentenciaSQL = "INSERT INTO productos(referencia, nombre, descripcion, precio, descuento) VALUES('$referencia', '$nombre', '$descripcion', '$precio', '$descuento')";
                operacionesMySql($sentenciaSQL, $base);
                header("Location:insertar_producto.php");
            } else {
                $mensaje = "<b class='mens_error'>ERROR. Ya existe un producto con esa referencia</b>";
            }
        } else {
            $mensaje =  "<b class='mens_error'>ERROR. No se han introducido todos los datos</b>";
        }
    }

    /**
     * Permite volver al menu de insertar indice
     */
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
        <!-- Menu de navegacion de botones -->
        <nav>
            <div>
                <table class="botonesMenu">
                    <tr>
                        <td class="botonesMenu">
                            <form action="index.php" method="post">
                                <input class="menu" type="submit" value="Indice">
                            </form>
                        </td>
                        <td class="botonesMenu">
                            <form action="../consulta.php" method="post">
                                <input class="menu" type="submit" value="Consulta de comerciales">
                            </form>
                        </td>
                        <td class="botonesMenu">
                            <form action="../insercion.php" method="post">
                                <input class="menu" type="submit" value="Indice inserción">
                            </form>
                        </td>
                        <td class="botonesMenu">
                            <form action="../modificacion.php" method="post">
                                <input class="menu" type="submit" value="Indice modificar">
                            </form>
                        <td class="botonesMenu">
                            <form action="../eliminacion.php" method="post">
                                <input class="menu" type="submit" value="Indice eliminar">
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
                <td><input type="text" name="referencia" size="10" class="centrado" pattern="[A-Z]{2}[0-9]{4}"></td>
                <td><input type="text" name="nombre" size="10" class="centrado" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+${3,20}"></td>
                <td><input type="text" name="descripcion" size="10" class="centrado"></td>
                <td><input type="number" name="precio" size="10" class="centrado"></td>
                <td><input type="number" name="descuento" size="10" class="centrado"></td>
                <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
                <td class='bot'><input type='submit' name='back' id='back' value='Volver'></td>
            </tr>
        </table>
        <?php
        //Muestra un mensaje, segun el resultado del insertado del comercial
        if (isset($_POST['cr'])) {
            echo "<br>" . $mensaje;
        } ?>

    </form>
</body>
</html>