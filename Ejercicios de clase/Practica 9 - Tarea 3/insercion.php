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
            $fecha = date('Y-m-d', strtotime(str_replace('-', '/', $fecha)));

            $base = "ventas_comerciales";
            $query = "INSERT INTO ventas(codComercial,refProducto,cantidad,fecha) values('$codigo','$referencia','$cantidad','$fecha')";
            operacionTransaccion($query, $base);
            header("Location:insercion.php");
        } else {
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
    <nav>
        <div>
            <input type="submit" value="Insertar venta" onclick="location.href='insertar/insertar_venta.php';">
            <input type="submit" value="Insertar producto" onclick="location.href='insertar/insertar_producto.php';">
            <input type="submit" value="Insertar comercial" onclick="location.href='insertar/insertar_comercial.php';">

        </div>
    </nav>

</body>

</html>