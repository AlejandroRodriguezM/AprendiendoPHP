<?php
include "./inc/header.inc.php";
//Recuperar la sesión
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Document</title>
</head>
<?php
//No me funciona correctamente
// if (isset($_SESSION['formulario2'])) {
//     $convivientes = $_GET['convivientes'];
//     $menu = $_GET['menu'];
//     $aficiones = $_GET['Aficiones'];
//     $_SESSION['convivientes'] = $convivientes;
//     $_SESSION['menu'] = $menu;
//     $_SESSION['aficiones'] = $aficiones;
//     $aficiones = implode(", ", $aficiones);
// } else {
//     die("Error. No estas registrado <a href='autentificacion.php'>Log in</a>");
// }

$convivientes = $_GET['convivientes'];
$menu = $_GET['menu'];
$aficiones = $_GET['Aficiones'];
$_SESSION['convivientes'] = $convivientes;
$_SESSION['menu'] = $menu;
$_SESSION['aficiones'] = $aficiones;
$aficiones = implode(", ", $aficiones);


?>

<body>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Miembros
                <a href="exportDataCSV.php" class="btn btn-success pull-right">Crear CSV</a>
                <a href="exportDataJSON.php" class="btn btn-success pull-right">Crear JSON</a>
                <a href="exportDataDB.php" class="btn btn-success pull-right">Guardar en db</a>
            </div>
            <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>">
                <div class="panel-body">
                    <table style="border: 0;">
                        <thead>
                            <tr style="border: 0;">
                                <td style="border: 0;">
                                    <input type="submit" name="aficiones" value="aficiones">
                                </td>
                                <td style="border: 0;">
                                    <input type="submit" name="nombreAmigosAficiones" value="aficiones y amigos">
                                </td>
                                <td style="border: 0;">
                                    <input type="submit" name="amigos" value="Datos de amigos">
                                </td>
                            </tr>
                    </table>
            </form>
            <?php
            include "inc/header.inc.php";
            if (isset($_POST['aficiones'])) {
                $tabla = seeTableAficiones();
                echo "<table class='table table-bordered table-striped'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Aficion</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach ($tabla as $fila) {
                    echo "<tr>";
                    echo "<td>" . $fila['idAficion'] . "</td>";
                    echo "<td>" . $fila['nombreAficion'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                $_SESSION['nom_tabla'] = 'aficiones';
            }

            if (isset($_POST['nombreAmigosAficiones'])) {
                $tabla = seeTableAmigosAficiones();
                echo "<table class='table table-bordered table-striped'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Aficion</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach ($tabla as $fila) {
                    echo "<tr>";
                    echo "<td>" . $fila['nombreAmigo'] . "</td>";
                    echo "<td>" . $fila['aficion'] . "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "<tbody>";
                foreach ($tabla as $fila) {
                    echo "<tr>";
                    echo "<td>" . $fila['nombreAmigo'] . "</td>";
                    echo "<td>" . $fila['aficion'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                $_SESSION['nom_tabla'] = 'aficionesamigos';
            }

            if (isset($_POST['amigos'])) {
                $tabla = seeTableAmigos();
                echo "<table class='table table-bordered table-striped'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Nombre y apellidos</th>";
                echo "<th>Email</th>";
                echo "<th>URL</th>";
                echo "<th>Sexo</th>";
                echo "<th>Convivientes</th>";
                echo "<th>Aficion favorita</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach ($tabla as $fila) {
                    echo "<tr>";
                    echo "<td>" . $fila['nombreYapel'] . "</td>";
                    echo "<td>" . $fila['email'] . "</td>";
                    echo "<td>" . $fila['url'] . "</td>";
                    echo "<td>" . $fila['sexo'] . "</td>";
                    echo "<td>" . $fila['convivientes'] . "</td>";
                    echo "<td>" . $fila['favorito'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                $_SESSION['nom_tabla'] = 'tb_amigos';
            }
            ?>

        </div>
    </div>
    </div>
</body>

</html>