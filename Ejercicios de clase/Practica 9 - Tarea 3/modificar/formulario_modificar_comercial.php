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
        $codigo = $_GET['codigo'];
        $nombre = $_GET['nombre'];
        $salario = $_GET['salario'];
        $hijos = $_GET['hijos'];
        $fNacimiento = $_GET['fNacimiento'];
    } else {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $salario = $_POST['salario'];
        $hijos = $_POST['hijos'];
        $fNacimiento = $_POST['fNacimiento'];
        $base = "ventas_comerciales";
        $query = "UPDATE comerciales SET nombre='$nombre', salario='$salario', hijos='$hijos', fNacimiento='$fNacimiento' where codigo='$codigo'";
        operacionesMySql($query, $base);
        header("Location:modificar_comercial.php");
    }
    if (isset($_POST['bot_cancelar'])) {
        header("Location:modificar_comercial.php");
    }
    ?>
    <h1>Actualizar comercial</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table width="25%" border="0" align="center">
            <tr>
                <td>Código</td>
                <td><label for="codigo"></label>
                    <input type="text" name="codigo" id="codigo" value="<?php echo $codigo ?>" readonly>
                </td>
                </td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><label for="nombre"></label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>">
                </td>
            </tr>
            <tr>
                <td>Salario</td>
                <td><label for="salario"></label>
                    <input type="number" name="salario" id="salario" value="<?php echo $salario ?>">
                </td>
            </tr>
            <tr>
                <td>Hijos</td>
                <td><label for="hijos"></label>
                    <input type="number" name="hijos" id="hijos" value="<?php echo $hijos ?>">
                </td>
            </tr>
            <tr>
                <td>Fecha de nacimiento</td>
                <td><label for="fNacimiento"></label>
                    <input type="date" name="fNacimiento" id="fNacimiento" value="<?php echo $fNacimiento ?>">
                </td>
            </tr>
            <tr>
                <td class='bot'><input type="submit" name="bot_actualizar" id="bot_actualizar" onclick="return confirm('¿Estas seguro que quieres modificar los datos del comercial?')" value="Actualizar"></td>
                <td class='bot'><input type="submit" name="bot_cancelar" id="bot_cancelar" value="Cancelar"></td>
            </tr>
        </table>
    </form>
</body>

</html>