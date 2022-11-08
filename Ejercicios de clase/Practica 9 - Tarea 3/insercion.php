<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Document</title>
</head>

<body>
    <?php
    include("funciones.php");
    //insertar datos
    if (isset($_POST['cr'])) {
        if (!empty($_POST['cod']) && !empty($_POST['ref']) && !empty($_POST['cant'] && !empty($_POST['fecha']))) {
            $codigo = $_POST['cod'];
            $referencia = $_POST['ref'];
            $cantidad = $_POST['cant'];
            $fecha = $_POST['fecha'];
            // $fecha = DateTime::createFromFormat('d-m-Y', $_POST['fecha']);
            // $fecha_Configurada = $fecha->format('Y-m-d');

            $base = "ventas_comerciales";
            // $query = "INSERT INTO ventas(codComercial,refProducto,cantidad,fecha) values('$codigo','$referencia','$cantidad','$fecha_Configurada')";
            $query = "INSERT INTO ventas(codComercial,refProducto,cantidad,fecha) values('$codigo','$referencia','$cantidad','$fecha')";
            operacionTransaccion($query, $base);
            header("Location:insercion.php");
        }
        else{
            echo "No se han introducido todos los datos";
        }
    }
    // //Listado de datos
    $conexion = conectar("ventas_comerciales");
    $query = "select * from ventas";
    $registros = $conexion->query($query) or die($conexion->error);
    ?>
    <div class="contenedor">
        <header onclick="location.href='index.php';" style="cursor: pointer;">
            <h1 id="inicio">Ventas comerciales</h1>
        </header>
        <nav>
            <div>
                <table class="botonesMenu">
                    <tr>
                        <td class="botonesMenu">
                            <form action="consulta.php" method="post">
                                <input class="menu" type="submit" value="consulta">
                            </form>
                        </td>
                        <td class="botonesMenu">
                            <form action="insercion.php" method="post">
                                <input class="menu" type="submit" value="insercion">
                            </form>
                        </td>
                        <td class="botonesMenu">
                            <form action="modificacion.php" method="post">
                                <input class="menu" type="submit" value="modificacion">
                            </form>
                        <td class="botonesMenu">
                            <form action="eliminacion.php" method="post">
                                <input class="menu" type="submit" value="eliminacion">
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </nav>
    </div>
    <h1>Insertando datos<span class="subtitulo"></span></h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table width="50%" border="0" align="center">
            <tr>
                <td class="primera_fila">Codigo vendedor</td>
                <td class="primera_fila">Referencia del producto</td>
                <td class="primera_fila">Cantidad</td>
                <td class="primera_fila">Fecha</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
            </tr>
            <?php
            while ($reg = $registros->fetch_array()) {
            ?>
                <tr>
                    <td><?php echo $reg['codComercial']; ?></td>
                    <td><?php echo $reg['refProducto']; ?></td>
                    <td><?php echo $reg['cantidad']; ?></td>
                    <td><?php echo $reg['fecha']; ?></td>
                </tr>
            <?php
            }
            $conexion->close();
            ?>
            <tr>

                <!-- <td><input type='text' name='cod' size='10' class='centrado'></td> -->
                <td><?php
                echo "<select name='cod' id='cod'>";
                echo "<option name='cod' value=''>Codigo vendedor</option>";

                $conexion = conectar("ventas_comerciales");
                $registros = $conexion->query("SELECT DISTINCT codComercial FROM ventas") or die($conexion->error);
                while ($reg = $registros->fetch_array()) {
                    echo "<option name='cod' value='" . $reg['codComercial'] . "'>" . $reg['codComercial'] . "</option>";
                }
                $conexion->close();
                echo "</select>";
                ?>

                </td>
                <td><?php
                echo "<select name='ref' id='ref'>";
                echo "<option name='ref' value=''>Referencia del producto</option>";

                $conexion = conectar("ventas_comerciales");
                $registros = $conexion->query("SELECT DISTINCT refProducto FROM ventas") or die($conexion->error);
                while ($reg = $registros->fetch_array()) {
                    echo "<option name='ref' value='" . $reg['refProducto'] . "'>" . $reg['refProducto'] . "</option>";
                }
                $conexion->close();
                echo "</select>";
                ?>

                </td>
                <td><input type='text' name='cant' size='10' class='centrado'></td>
                <td><input type='text' name='fecha' size='10' class='centrado'></td>
                <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
            </tr>
        </table>

    </form>

</body>

</html>