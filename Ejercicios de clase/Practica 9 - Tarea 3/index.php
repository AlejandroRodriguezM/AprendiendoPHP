<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="shortcut icon" href="img/ico.png">
    <title>Pagina principal</title>
</head>

<body>
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
        <div class="indice">
            <h1>Pagina principal</h1>
                <p>Esta pagina sirve para controlar las ventas, productos y comerciales de la tienda. Usando base de datos MySql.</p>
                <p>En esta practica podras consultar diferentes datos de un comercial en concreto.</p>
                <p>Podras modificar datos de un comercial, de una venta especifica o de un producto especifico.</p>
                <p>Podras añadir datos de un comercial, de una venta especifica o de un producto especifico.</p>
                <p>Podras eliminar datos de un comercial, de una venta especifica o de un producto especifico.</p>
        </div>
    </div>

</body>

</html>