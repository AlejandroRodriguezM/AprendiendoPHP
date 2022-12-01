<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Exportar a csv</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Miembros
                <a href="exportData.php" class="btn btn-success pull-right">Exportar Miembros</a>
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