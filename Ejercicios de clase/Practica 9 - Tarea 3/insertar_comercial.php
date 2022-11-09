<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <title>Document</title>
</head>

<body>
    <?php
    include_once '../funciones.php';
    //insertar datos
    if (isset($_POST['cr'])) {
        if (!empty($_POST['codigo']) && !empty($_POST['nombre']) && !empty($_POST['salario'] && !empty($_POST['hijos']) && !empty($_POST['fNacimiento']))) {
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $salario = $_POST['salario'];
            $hijos = $_POST['hijos'];
            $fNacimiento = $_POST['fNacimiento'];
            $fNacimiento = date('Y-m-d', strtotime(str_replace('-', '/', $fNacimiento)));
            $query = "select codigo from comerciales where codigo = '$codigo'";
            if (checkID($query)) {
                $base = "ventas_comerciales";
                $sentenciaSQL = "INSERT INTO comerciales(codigo, nombre, salario, hijos, fNacimiento) VALUES('$codigo', '$nombre', '$salario', '$hijos', '$fNacimiento')";
                operacionTransaccion($sentenciaSQL, $base);
                header("Location:insertar_comercial.php");
            } else {
                echo "El codigo introducido ya existe";
            }
        } else {
            echo "No se han introducido todos los datos";
        }
    }

    if (isset($_POST['back'])) {
        header("Location:../insercion.php");
    }
    // //Listado de datos
    $conexion = conectar("ventas_comerciales");
    $query = "select * from comerciales";
    $registros = $conexion->query($query) or die($conexion->error);
    ?>
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
                                <input class="menu" type="submit" value="consulta">
                            </form>
                        </td>
                        <td class="botonesMenu">
                            <form action="../insercion.php" method="post">
                                <input class="menu" type="submit" value="insercion">
                            </form>
                        </td>
                        <td class="botonesMenu">
                            <form action="../modificacion.php" method="post">
                                <input class="menu" type="submit" value="modificacion">
                            </form>
                        <td class="botonesMenu">
                            <form action="../eliminacion.php" method="post">
                                <input class="menu" type="submit" value="eliminacion">
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </nav>
    </div>
    <h1>Insertando comerciales<span class="subtitulo"></span></h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table width="50%" border="0" align="center">
            <tr>
                <td class="primera_fila">Codigo</td>
                <td class="primera_fila">Nombre</td>
                <td class="primera_fila">Salario</td>
                <td class="primera_fila">Hijos</td>
                <td class="primera_fila">Fecha de nacimiento</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
            </tr>
            <?php
            $row = $registros->fetch();
            while ($row != null) {
            ?>
                <tr>
                    <td><?php echo $row['codigo']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['salario']; ?></td>
                    <td><?php echo $row['hijos']; ?></td>
                    <td><?php echo $row['fNacimiento']; ?></td>
                </tr>
            <?php
                $row = $registros->fetch();
            }
            $conexion = null;
            ?>
            <tr>
                <td><input type="text" name="codigo" size="10" class="centrado"></td>
                <td><input type="text" name="nombre" size="10" class="centrado"></td>
                <td><input type="text" name="salario" size="10" class="centrado"></td>
                <td><input type="text" name="hijos" size="10" class="centrado"></td>
                <td><input type="date" name="fNacimiento" size="10" class="centrado"></td>
                <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
                <td class='bot'><input type='submit' name='back' id='back' value='Volver'></td>
            </tr>
        </table>

    </form>

</body>

</html>