<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="shortcut icon" href="img/ico.png">
    <title>Indice de modificación</title>
</head>

<body>
    <div class="contenedor">
        <header onclick="location.href='index.php';" style="cursor: pointer;">
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
        <h1>Modificando datos<span class="subtitulo"></span></h1>
        <p>Aqui aparecen los indices para moverte en las diferentes opciones.</p>
        <p>Segun la opcion, podras modificar datos </p>
        <div class="subMenu_botones">
            <input class="boton_indice" type="image" src="img/ventas.jpg" value="Modificar venta" alt="Submit" width="150" height="150" onclick="location.href='modificar/modificar_venta.php';">
            <input class="boton_indice" type="image" src="img/producto.jpg" value="Modificar producto" alt="Submit" width="150" height="150" onclick="location.href='modificar/modificar_producto.php';">
            <input class="boton_indice" type="image" src="img/comercial.jpg" value="Modificar comercial" alt="Submit" width="150" height="150" onclick="location.href='modificar/modificar_comercial.php';">
        </div>
    </div>


</body>

</html>