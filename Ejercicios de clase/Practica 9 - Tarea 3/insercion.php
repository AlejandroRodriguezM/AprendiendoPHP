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

            $base = "ventas_comerciales";
            $query = "INSERT INTO ventas(codComercial,refProducto,cantidad,fecha) values('$codigo','$referencia','$cantidad','$fecha')";
            operacionTransaccion($query, $base);
            // header("Location:index.php");
        }
    }
    // //Listado de datos
    $conexion = conectar("ventas_comerciales");
    $query = "select * from ventas";
    $registros = $conexion->query($query) or die($conexion->error);
    ?>
    <div class="contenedor">
        <header>
            <h1 id="inicio">Ventas comerciales</h1>
        </header>
        <nav>
            <div>
                <input type="submit" value="consulta">
                <input type="submit" value="insercion">
                <input type="submit" value="modificacion">
                <input type="submit" value="eliminacion">
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
                <td><input type='text' name='cod' size='10' class='centrado'></td>
                <td><input type='text' name='ref' size='10' class='centrado'></td>
                <td><input type='text' name='cant' size='10' class='centrado'></td>
                <td><input type='text' name='fecha' size='10' class='centrado'></td>
                <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
            </tr>
        </table>
        
    </form>

</body>

</html>