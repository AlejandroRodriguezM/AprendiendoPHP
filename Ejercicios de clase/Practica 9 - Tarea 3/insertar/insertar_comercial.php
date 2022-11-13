<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="shortcut icon" href="../img/ico.png">
    <title>Document</title>
</head>

<body>
    <?php
    include_once '../funciones.php';
    $mensaje = "";
    if (isset($_POST['cr'])) {
        if (!empty($_POST['codigo']) && !empty($_POST['nombre']) && !empty($_POST['salario']) && !empty($_POST['hijos']) && !empty($_POST['fNacimiento'])) {
            $salarioMinimoInterprofesional = 1000;
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $salario = $_POST['salario'];
            if ($salario < $salarioMinimoInterprofesional || $salario == 0) {
                $salario = $salarioMinimoInterprofesional;
            }
            $hijos = $_POST['hijos'];
            $fNacimiento = $_POST['fNacimiento'];
            $fNacimiento = date('Y-m-d', strtotime(str_replace('-', '/', $fNacimiento)));
            $arrayFecha = explode("-", $fNacimiento);

            $nacimiento = $arrayFecha[0];
            if (checkAge($nacimiento)) {
                $query = "select codigo from comerciales where codigo = '$codigo'";
                $mensaje = "<b class='mens_ok'>Has añadido correctamente al comercial $nombre con codigo $codigo</b>";
                if (!checkID($query)) {
                    $base = "ventas_comerciales";
                    $sentenciaSQL = "INSERT INTO comerciales(codigo, nombre, salario, hijos, fNacimiento) VALUES('$codigo', '$nombre', '$salario', '$hijos', '$fNacimiento')";
                    operacionesMySql($sentenciaSQL, $base);
                    header("Location:insertar_comercial.php");
                } else {
                    $mensaje = "<b class='mens_error'>ERROR.El codigo introducido ya existe</b>";
                }
            } else {
                $mensaje = "<b class='mens_error'>ERROR. El comercial debe ser mayor de edad. Se ha cancelado el insertado</b>";
            }
        } else {
            $mensaje =  "<b class='mens_error'>ERROR. No se han introducido todos los datos</b>";
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
                <td><input type="text" name="codigo" size="10" class="centrado" pattern="[0-9]{3}"></td>
                <td><input type="text" name="nombre" size="10" class="centrado" pattern="[A-Za-z]{3,30}"></td>
                <td><input type="number" name="salario" size="10" class="centrado"></td>
                <td><input type="number" name="hijos" size="10" class="centrado"></td>
                <td><input type="date" name="fNacimiento" size="10" class="centrado"></td>
                <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
                <td class='bot'><input type='submit' name='back' id='back' value='Volver'></td>

            </tr>
        </table>
        <?php
        if (isset($_POST['cr'])) {
            echo "<br>" . $mensaje;
        } ?>
    </form>

</body>

</html>