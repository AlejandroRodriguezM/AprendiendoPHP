<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="shortcut icon" href="img/ico.png">
    <title>Consulta de comerciales</title>
</head>

<body>
    <?php
    include_once 'funciones.php';
    $mensaje = "";
    //Listado de datos
    $conexion = conectar("ventas_comerciales");
    $query = "select * from comerciales";
    $registros = $conexion->query($query) or die($conexion->error);
    ?>
    <div class="contenedor">
        <header onclick="location.href='index.php';" style="cursor: pointer;">
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
                            <form action="consulta.php" method="post">
                                <input class="menu" type="submit" value="Consulta de comerciales">
                            </form>
                        </td>
                        <td class="botonesMenu">
                            <form action="insercion.php" method="post">
                                <input class="menu" type="submit" value="Indice inserción">
                            </form>
                        </td>
                        <td class="botonesMenu">
                            <form action="modificacion.php" method="post">
                                <input class="menu" type="submit" value="Indice modificar">
                            </form>
                        <td class="botonesMenu">
                            <form action="eliminacion.php" method="post">
                                <input class="menu" type="submit" value="Indice eliminar">
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </nav>
    </div>
    <h1>Consultar comerciales<span class="subtitulo"></span></h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table width="50%" border="0" align="center">
            <tr>
                <td class="primera_fila">Nombre</td>
                <td class="sin">&nbsp;</td>
            </tr>

            <?php
            $row = $registros->fetch();
            while ($row != null) {
            ?>
                <tr>
                    <td>
                        <select name='cod' id='cod'>
                            <?php
                            //Permite mostrar el nombre y codigo asociado a comercial
                            echo "<option name='cr' value=''>Nombre del vendedor y su codigo asociado</option>";
                            $conexion = conectar("ventas_comerciales");
                            $query = "select * from comerciales";
                            $registros = $conexion->query($query) or die($conexion->error);
                            $row = $registros->fetch();
                            while ($row != null) {
                            ?>
                                <option value="<?php echo $row['codigo']; ?>"><?php echo $row['nombre'] . " - " . $row['codigo']; ?></option>
                            <?php

                                $row = $registros->fetch();
                            }
                            $conexion = null;
                            ?>
                        </select>
                    <?php
                    $row = $registros->fetch();
                }
                $conexion = null;
                    ?>
                    <input type='submit' name='consulta' id='consulta' value='consultar'>
                    </td>
                </tr>
                <tr>
                    <td class="sin">&nbsp;</td>
                </tr>
        </table>
        <table width="50%" border="0" align="center">
            <?php
            if (isset($_POST['consulta'])) {
                $codigo = $_POST['cod'];
                $query = "select referencia, productos.nombre, descripcion, precio, descuento, cantidad, fecha
                            from productos inner join ventas on refProducto = referencia
                            inner join comerciales on codigo = codComercial
                            where codigo = '$codigo'";
                $base = "ventas_comerciales";
                $conexion = conectar($base);
                $registros = $conexion->query($query) or die($conexion->error);
                $row = $registros->fetch();
                if ($registros->fetchColumn() == 0) {
                    $mensaje = "<b class='mens_error'>No hay ventas para el comercial: $codigo </b>";
                } else {
                    echo "<tr>
                            <td class='primera_fila'>Referencia</td>
                            <td class='primera_fila'>Nombre</td>
                            <td class='primera_fila'>Descripcion</td>
                            <td class='primera_fila'>Precio</td>
                            <td class='primera_fila'>Descuento</td>
                            <td class='primera_fila'>Cantidad</td>
                            <td class='primera_fila'>Fecha</td>
                        </tr>";

                    while ($row != null) {
                        echo "<tr>";
                        echo "<td>" . $row['referencia'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['descripcion'] . "</td>";
                        echo "<td>" . $row['precio'] . "</td>";
                        echo "<td>" . $row['descuento'] . "</td>";
                        echo "<td>" . $row['cantidad'] . "</td>";
                        echo "<td>" . $row['fecha'] . "</td>";
                        echo "</tr>";
                        $row = $registros->fetch();
                    }
                }
            } ?>
        </table>
        
        <?php
        //Muestra un mensaje, segun el resultado del insertado del comercial
        if (isset($_POST['consulta'])) {
            echo "<br>" . $mensaje;
        } ?>
    </form>
</html>