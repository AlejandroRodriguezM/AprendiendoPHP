<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="shortcut icon" href="../img/ico.png">
    <title>Eliminacion de producto</title>
</head>

<body>
    <?php
    include_once '../funciones.php';

    /**
     * Permite eliminar un comercial de la base de datos.
     */
    if (isset($_POST['del'])) {
        $referencia = $_POST['referencia'];
        $base = "ventas_comerciales";
        $sentenciaSQL = "DELETE FROM productos WHERE referencia='$codigo';";
        operacionesMySql($sentenciaSQL, $base);
        header("Location:eliminacion_producto.php");
    }

    /**
     * Permite volver al menu de eliminacion indice
     */
    if (isset($_POST['back'])) {
        header("Location:../eliminacion.php");
    }

    //Listado de datos
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
    <h1>Eliminando productos<span class="subtitulo"></span></h1>
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
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <td class='bot'><input type='submit' name='del' id='del' onclick="return confirm('¿Estas seguro que quieres eliminar el producto?')" value='Eliminar'></td>
                        <td class='bot'><input type='hidden' name='referencia' id='referencia' value='<?php echo $row['referencia']; ?>'></td>
                    </form>

                </tr>
            <?php
                $row = $registros->fetch();
            }
            $conexion = null;
            ?>
            <tr>
                <td class="sin">&nbsp;</td>
            </tr>
            <tr>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class='bot'><input type='submit' name='back' id='back' value='Volver'></td>
            </tr>
        </table>

    </form>
</body>
</html>