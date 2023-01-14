<?php
session_start();
include_once "php/clases/Anunciantes.php";
include_once "php/clases/ClaseDb.php";

$db = new ClaseDb();
if (!isset($_COOKIE['adminUser'])) {
    header("Location: inicio.php");
}
$usuario = new Anunciantes("", "", "", "");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style/style.css">
    <title>Usuarios</title>
</head>

<?php

if (isset($_COOKIE['color'])) {
    echo '<body style="background-color:' . $_COOKIE['color'] . '">';
} else {
    echo '<body>';
}

?>
<header onclick="location.href='inicio.php';" style="cursor: pointer;">
    <h1>Empresa Okupa</h1>
</header>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">

            <a class="nav-item nav-link active" href="#">Publicar anuncio</a>

            <a class="nav-item nav-link active" href="inicio.php">Listado de anuncios</a>

            <a class="nav-item nav-link active" href="preferencia.php">Preferencias</a>
            <?php
            if ($_SESSION['login'] == 'dwes') {
                echo "<a class='nav-item nav-link active' href='desbloquear.php'>Desbloquear</a>";
            }
            ?>
            <a class="nav-item nav-link active" href="logOut.php" style="margin-left: 15px;">Salir</a>
            <a class="nav-item nav-link active" style="margin-left: 1350px; color: black; position: absolute"><?php echo "Bienvenido: ", $_SESSION['login'] ?></a>
            <a class="nav-item nav-link active" style="margin-left: 1500px; color: black; position: absolute"><?php echo "Hora de conexion:", $_SESSION['hora'] ?></a>
        </div>
    </div>
</nav>

<div class="tabla_users">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php
        $resultado = $usuario->mostrar_usuarios();
        echo "<table class='table table-striped table-bordered table-hover' style='width: 100%; margin: 0 auto; !important'>
                <tr style='background-color: yellow'>
                <th>login</th>
                <th>email</th>
                <th>estado</th>
                <th></th>
                </tr>";
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            //form
            $login = $row['login'];
            $email = $row['email'];
            $estado = $row['bloqueado'];
            echo "<tr style='background-color: white'>";
            echo "<td>" . $login . "</td>";
            echo "<td>" . $email . "</td>";
            echo "<td>" .  $estado . "</td>";
            if ($row['bloqueado'] == 1) {
        ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <?php
                    if ($login == 'dwes') {
                        echo "<td><input class='btn btn-primary' name='bloquear' id='bloquear' type='submit' value='Bloquear' style='margin-left:50% !important' disabled></td>";
                    } else {
                        echo "<td><input class='btn btn-primary' name='bloquear' id='bloquear' type='submit' value='Bloquear' style='margin-left:50% !important'></td>";
                    }
                    ?>
                    <input name='login' id='login' type='hidden' value='<?php echo $login ?>'>
                </form>
            <?php
            } else {
            ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <?php
                    if ($login == 'dwes') {
                        echo "<td><input class='btn btn-primary' name='desbloquear' id='desloquear' type='submit' value='Desbloquear' style='margin-left:50% !important' disabled></td>";
                    } else {
                        echo "<td><input class='btn btn-primary' name='desbloquear' id='desloquear' type='submit' value='Desbloquear' style='margin-left:50% !important'></td>";
                    }
                    ?>
                    <input name='login' id='login' type='hidden' value='<?php echo $login ?>'>
                </form>
        <?php
            }
            echo "</tr>";
        }
        if (isset($_POST['desbloquear'])) {
            $login = $_POST['login'];
            $usuario->bloquear_usuario($login);
        }

        if (isset($_POST['bloquear'])) {
            $login = $_POST['login'];
            $usuario->desbloquear_usuario($login);
        }
        echo "<tr style='background-color: orange'>
                <td colspan='4' >";
        $numero_usuarios = $usuario->num_anunciantes();
        echo "<p>Total: $numero_usuarios</p>";
        echo "</td>";
        echo "</tr>";
        echo "</table>";
        ?>
    </form>
</div>
</body>

</html>