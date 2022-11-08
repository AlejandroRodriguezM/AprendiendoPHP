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
        <nav>
            <div>
                <form action="insercion.php" method="post">
                    <input type="submit" name="insertarVenta" value="Insertar venta">
                    <input type="submit" value="Insertar producto" name="insertarProducto" id="insertarProducto">

                </form>
                <?php     //si se ha pulsado el boton insertarVenta
                    if (isset($_REQUEST['insertarVenta']) == "Insertar venta") {
                        formularioInsertarVenta();
                    } ?>
            </div>
        </nav>
    </div>


</body>

</html>