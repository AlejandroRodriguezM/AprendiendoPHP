<?php

require_once "php/Persona.php";
require_once "php/Empleado.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php


    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php
        echo "<table>
        <tr>
        <td><input type='text' name='nombre_persona' placeholder='Nombre de la persona' required></td>
        <td><input type='text' name='apellido_persona' placeholder='Apellido de la persona' required></td>
        <td><input type='number' name='salario_persona' placeholder='Salario' required></td>
        <td><input type='submit' name='guardar_empleado' value='Crear objeto'></td>
        </tr>
        </table>";

        ?>
    </form>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php
        echo "<table>
            <tr>";
        echo "<label for='num1'>Ingrese un telefono:</label>";
        echo "<td><input type='number' name='telefono_persona' placeholder='Telefono'></td>";
        ?>
        <br>
        <td><input type="submit" name="ingresar" value="Ingresar Telefono"></td>
        <td><input type="submit" name="vaciar" value="Vaciar Telefonos"></td>
    </form>
    <?php
    echo "</tr>
            </table>";
    echo "</form>";
    ?>
    <form method="post" action="resultado.php">
        <?php
        if (isset($_SESSION['empleado'])) {
            echo "<td><input type='submit' name='mostrar' value='mostrar'></td>";
        }
        echo "</form>";
        if (isset($_POST['guardar_empleado'])) {
            if (!empty($_POST['nombre_persona']) && !empty($_POST['apellido_persona']) && !empty($_POST['salario_persona'])) {
                $nombre = $_POST['nombre_persona'];
                $apellido = $_POST['apellido_persona'];
                $salario = $_POST['salario_persona'];
                $empleado = new Empleado($nombre, $apellido, $salario, []);
                $_SESSION['empleado'] = $empleado;
                header("Location: ./formulario.php");
            }
        }

        if (isset($_POST['ingresar'])) {
            $telefono = $_POST['telefono_persona'];
            $empleado = $_SESSION['empleado'];
            $empleado->anyadirTelefono($telefono);
            $_SESSION['empleado'] = $empleado;
            
        }

        if (isset($_POST['vaciar'])) {
            $empleado = $_SESSION['empleado'];
            $empleado->borrarTelefonos();
            $_SESSION['empleado'] = $empleado;
        }

        if (isset($_POST['mostrar'])) {
            header("Location: ./resultado.php");
        }
        ?>
</body>

</html>