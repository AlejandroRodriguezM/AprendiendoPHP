<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CRUD JSON</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <?php
    $error = "";
    if (isset($_COOKIE['mierror'])) {
        $error = $_COOKIE['mierror'];
    }
    ?>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Miembros
                <a href="add.php" class="btn btn-success pull-right">Agregar Miembros</a>
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
                echo "<table class='table table-bordered'>";
                echo "<thead>
                    <tr>
                    <th>Id Aficion</th>
                    <th>Nombre Aficion</th>
                    </tr>
                </thead>
                <tbody>";
                visualizarTablaJSONAficiones();
                echo "</tbody>";
                echo "</table>";
                $_SESSION['nom_tabla'] = 'aficiones';
            }

            if (isset($_POST['nombreAmigosAficiones'])) {
                echo "<table class='table table-bordered'>";
                echo "<thead>
                    <tr>
                    <th>Nombre amigo</th>
                    <th>aficion</th>
                    </tr>
                    </thead>
                <tbody>";
                visualizarTablaJSONaficionesAmigos();
                echo "</tbody>";
                echo "</table>";
                $_SESSION['nom_tabla'] = 'aficionesamigos';
            }

            if (isset($_POST['amigos'])) {
                echo "<table class='table table-bordered'>";
                echo "<thead>
                    <tr>
                    <th>Nombre y apellido</th>
                    <th>Email</th>
                    <th>URL</th>
                    <th>Sexo</th>
                    <th>Convivientes</th>
                    <th>Favorito</th>
                    <th>Actualizar</th>
                    <th>Borrar</th>
                    </tr>
                    </thead>
                <tbody>";
                visualizarTablaJSONAmigos();
                echo "</tbody>";
                echo "</table>";
                $_SESSION['nom_tabla'] = 'tb_amigos';
            }
            ?>
            <tbody>
                <tr>
                    <td colspan="7">
                        <?php
                        echo $error;
                        setcookie('mierror', "", time() - 3600);
                        ?>
                    </td>
                </tr>
            </tbody>
        </div>
    </div>
    </div>
</body>

</html>