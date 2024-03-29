<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="shortcut icon" href="../img/ico.png">
    <title>Modificar venta</title>
</head>

<body>
    <?php
    include_once '../funciones.php';
    /**
     * Al pulsar el boton mod, se guardaran los datos en una variable y mediante header se mandaran los datos a la pagina de formulario formulario_modificar_X.php 
     */
    if (isset($_POST['del'])) {
        $codComercial = $_POST['codComercial'];
        $refProducto = $_POST['refProducto'];
        $cantidad = $_POST['cantidad'];
        $fecha = $_POST['fecha'];
        header("Location: formulario_modificar_venta.php?codComercial=$codComercial&refProducto=$refProducto&cantidad=$cantidad&fecha=$fecha");
    }

    /**
     * Permite volver al menu indice de modificacion
     */
    if (isset($_POST['back'])) {
        header("Location:../modificar.php");
    }

    //Listado de datos
    $conexion = conectar("ventas_comerciales");
    $query = "select * from ventas";
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
    <h1>Modificando ventas<span class="subtitulo"></span></h1>
    <!-- Tabla de datos -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table width="50%" border="0" align="center">
            <tr>
                <td class="primera_fila">Codigo comercial</td>
                <td class="primera_fila">Referencia del producto</td>
                <td class="primera_fila">Cantidad</td>
                <td class="primera_fila">Fecha</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>

            </tr>
            <?php
            $row = $registros->fetch();
            while ($row != null) {
            ?>
            <!--Datos de ventas -->
                <tr>
                    <td><?php echo $row['codComercial']; ?></td>
                    <td><?php echo $row['refProducto']; ?></td>
                    <td><?php echo $row['cantidad']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <td class='bot'><input type='submit' name='del' id='del' value='Modificar'></td>
                        <td class='bot'><input type='hidden' name='codComercial' id='codComercial' value='<?php echo $row['codComercial']; ?>'></td>
                        <td class='bot'><input type='hidden' name='refProducto' id='refProducto' value='<?php echo $row['refProducto']; ?>'></td>
                        <td class='bot'><input type='hidden' name='cantidad' id='cantidad' value='<?php echo $row['cantidad']; ?>'></td>
                        <td class='bot'><input type='hidden' name='fecha' id='fecha' value='<?php echo $row['fecha']; ?>'></td>

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
                <td class='bot'><input type='submit' name='back' id='back' value='Volver'></td>
            </tr>
        </table>
    </form>
</body>
</html>