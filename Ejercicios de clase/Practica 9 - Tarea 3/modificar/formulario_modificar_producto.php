<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="shortcut icon" href="../img/ico.png">
    <title>Document</title>
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
    if (!isset($_POST['bot_actualizar'])) {
        $referencia = $_GET['referencia'];
        $nombre = $_GET['nombre'];
        $descripcion = $_GET['descripcion'];
        $precio = $_GET['precio'];
        $descuento = $_GET['descuento'];
    } else {
        $referencia = $_POST['referencia'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $descuento = $_POST['descuento'];
        $base = "ventas_comerciales";
        $query = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', descuento = '$descuento' WHERE referencia = '$referencia'";
        operacionesMySql($query, $base);
        header("Location:modificar_producto.php");
    }
    if (isset($_POST['bot_cancelar'])) {
        header("Location:modificar_producto.php");
    }
    ?>
    <h1>Actualizar producto</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table width="25%" border="0" align="center">
            <tr>
                <td>Referencia</td>
                <td><label for="codigo"></label>
                    <input type="text" name="referencia" id="referencia" value="<?php echo $referencia ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><label for="nombre"></label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>">
                </td>
            </tr>
            <tr>
                <td>Descripcion</td>
                <td><label for="descripcion"></label>
                    <input type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion ?>">
                </td>
            </tr>
            <tr>
                <td>Precio</td>
                <td><label for="precio"></label>
                    <input type="number" name="precio" id="precio" value="<?php echo $precio ?>">
                </td>
            </tr>
            <tr>
                <td>Descuento</td>
                <td><label for="descuento"></label>
                    <input type="number" name="descuento" id="descuento" value="<?php echo $descuento ?>">
                </td>
            </tr>
            <tr>
                <td class='bot'><input type="submit" name="bot_actualizar" id="bot_actualizar" onclick="return confirm('¿Estas seguro que quieres modificar los datos del producto?')" value="Actualizar"></td>
                <td class='bot'><input type="submit" name="bot_cancelar" id="bot_cancelar" value="Cancelar"></td>
            </tr>
        </table>
    </form>
</body>

</html>