<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="shortcut icon" href="../img/ico.png">
    <title>Modificando comercial</title>
</head>

<body>
    <?php
    include_once '../funciones.php';
    /**
     * Al pulsar el boton mod, se guardaran los datos en una variable y mediante header se mandaran los datos a la pagina de formulario formulario_modificar_X.php 
     */
    if (isset($_POST['mod'])) {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $salario = $_POST['salario'];
        $hijos = $_POST['hijos'];
        $fNacimiento = $_POST['fNacimiento'];
        header("Location: formulario_modificar_comercial.php?codigo=$codigo&nombre=$nombre&salario=$salario&hijos=$hijos&fNacimiento=$fNacimiento");
    }

    /**
     * Permite volver al menu indice de modificacion
     */
    if (isset($_POST['back'])) {
        header("Location:../modificacion.php");
    }

    //Lista de datos
    $conexion = conectar("ventas_comerciales");
    $query = "select * from comerciales";
    $registros = $conexion->query($query) or die($conexion->error);
    ?>
    <div class="contenedor">
        <header onclick="location.href='../index.php';" style="cursor: pointer;">
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
    <h1>Modificar comerciales.<span class="subtitulo"></span></h1>
    <!-- Tabla de datos -->
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
                <!--Datos de comercial -->
                <tr>
                    <td><?php echo $row['codigo']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['salario']; ?></td>
                    <td><?php echo $row['hijos']; ?></td>
                    <td><?php echo $row['fNacimiento']; ?></td>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <td class='bot'><input type='submit' name='mod' id='mod' value='Modificar' </td>
                        <td class='bot'><input type='hidden' name='codigo' id='codigo' value='<?php echo $row['codigo']; ?>'></td>
                        <td class='bot'><input type='hidden' name='nombre' id='nombre' value='<?php echo $row['nombre']; ?>'></td>
                        <td class='bot'><input type='hidden' name='salario' id='salario' value='<?php echo $row['salario']; ?>'></td>
                        <td class='bot'><input type='hidden' name='hijos' id='hijos' value='<?php echo $row['hijos']; ?>'></td>
                        <td class='bot'><input type='hidden' name='fNacimiento' id='fNacimiento' value='<?php echo $row['fNacimiento']; ?>'></td>
                    </form>
                </tr>
            <?php
                $row = $registros->fetch();
            }
            $conexion = null;
            ?>
            <tr>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class='bot'><input type='submit' name='back' id='back' value='Volver'></td>
            </tr>
        </table>
    </form>
</body>
</html>