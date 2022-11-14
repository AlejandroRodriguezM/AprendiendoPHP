<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="shortcut icon" href="../img/ico.png">
    <title>Formulario para modificar venta</title>
</head>

<body>
    <div class="contenedor">
        <header onclick="location.href='../index.php';" style="cursor: pointer;">
            <h1 id="inicio">Ventas comerciales</h1>
        </header>
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
    <?php
    include("../funciones.php");
    /**
     * Cuando se carga la pagina, los datos que se mostraran seran aquellos que han recibido del fichero modificicar_venta.
     * Una vez pulsado el boton actualizar, se guardaran los datos en pantalla
     */
    $mensaje = "";
    if (!isset($_POST['bot_actualizar'])) {
        $conComercial = $_GET['codComercial'];
        $refProducto = $_GET['refProducto'];
        $cantidad = $_GET['cantidad'];
        $fecha = $_GET['fecha'];
    } else {
        if (!empty($_POST['cod']) && !empty($_POST['ref']) && !empty($_POST['cant']) && !empty($_POST['fecha'])) {
            $conComercial = $_POST['codComercial'];
            $refProducto = $_POST['refProducto'];
            $cantidad = $_POST['cantidad'];
            $fecha = $_POST['fecha'];
            $sql = "UPDATE ventas SET codComercial='$conComercial', refProducto='$refProducto', cantidad='$cantidad', fecha='$fecha' WHERE codComercial='$conComercial'";
            operacionesMySql($query, $base);
            header("Location:modificar_venta.php");
        }
    }

    if (isset($_POST['bot_cancelar'])) {
        header("Location:modificar_venta.php");
    }

    ?>
    <h1>Actualizar venta</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table width="25%" border="0" align="center">
            <tr>
                <td>Codigo del comercial</td>
                <td><select name='codComercial' id='codComercial'>
                        <?php
                        echo "<option name='codComercial' value=''>Codigo de vendedor</option>";
                        $conexion = conectar("ventas_comerciales");
                        $query = "select DISTINCT codComercial from ventas";
                        $registros = $conexion->query($query) or die($conexion->error);
                        $row = $registros->fetch();
                        while ($row != null) {
                        ?>
                            <option value="<?php echo $row['codComercial']; ?>"><?php echo $row['codComercial']; ?></option>
                        <?php

                            $row = $registros->fetch();
                        }
                        $conexion = null;
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Referencia del producto</td>
                <td><select name='refProducto' id='refProducto'>
                        <?php
                        echo "<option name='refProducto' value=''>Referencia del producto</option>";
                        $conexion = conectar("ventas_comerciales");
                        $query = "select DISTINCT refProducto from ventas";
                        $registros = $conexion->query($query) or die($conexion->error);
                        $row = $registros->fetch();
                        while ($row != null) {
                        ?>
                            <option value="<?php echo $row['refProducto']; ?>"><?php echo $row['refProducto']; ?></option>
                        <?php

                            $row = $registros->fetch();
                        }
                        $conexion = null;
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>cantidad</td>
                <td><label for="cantidad"></label>
                    <input type="number" name="cantidad" id="cantidad" value="<?php echo $cantidad ?>">
                </td>
            </tr>
            <tr>
                <td>fecha</td>
                <td><label for="fecha"></label>
                    <input type="date" name="fecha" id="fecha" value="<?php echo $fecha ?>">
                </td>
            </tr>
            <tr>
                <td class='bot'><input type="submit" name="bot_actualizar" id="bot_actualizar" onclick="return confirm('¿Estas seguro que quieres modificar los datos de la venta?')" value="Actualizar"></td>
                <td class='bot'><input type="submit" name="bot_cancelar" id="bot_cancelar" value="Cancelar"></td>
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