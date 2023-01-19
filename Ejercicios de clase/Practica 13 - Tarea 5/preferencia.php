<?php
session_start();
include_once "php/clases/Anuncio.php";
include_once "php/clases/ClaseDb.php";
include_once "php/clases/funciones.inc.php";

check_cookies();

if (!isset($_SESSION['login'])) {
    header("Location: logOut.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style/style.css">
    <title>Preferencia</title>
</head>

<?php

if (!isset($_COOKIE['color'])) {
    $color = "white";
    setcookie('color', $color, time() + 3600, '/');
    echo '<body style="background-color:' . $_COOKIE['color'] . '">';
    header("Location: preferencia.php");
}
if (isset($_COOKIE['color'])) {
    echo '<body style="background-color:' . $_COOKIE['color'] . '">';
}
if (isset($_POST['enviar'])) {
    if (isset($_POST['color_fondo'])) {
        $color = $_POST['color_fondo'];
        setcookie('color', $color, time() + 3600, '/');
    }
    echo '<body style="background-color:' . $_COOKIE['color'] . '">';
    header("Location: preferencia.php");
}
if (isset($_POST['restablecer'])) {
    $color = "white";
    setcookie('color', $color, time() + 3600, '/');
    echo '<body style="background-color:' . $_COOKIE['color'] . '">';
    header("Location: preferencia.php");
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

            <a class="nav-item nav-link active" href="anuncio.php">Publicar anuncio</a>

            <a class="nav-item nav-link active" href="inicio.php">Listado de anuncios</a>

            <a class="nav-item nav-link active" href="preferencia.php">Preferencias</a>
            <?php
            if ($_SESSION['login'] == 'dwes') {
                echo "<a class='nav-item nav-link active' href='desbloquear.php'>Desbloquear</a>";
            }
            ?>
            <a class="nav-item nav-link active" href="logOut.php" style="margin-left: 15px;">Salir</a>
            <a class="nav-item nav-link active" href="#" style="margin-left: 1150px; color: black; position: absolute;"><?php echo "Bienvenido: ", $_SESSION['login'] ?></a>
            <a class="nav-item nav-link active" href="#" style="margin-left: 1300px; color: black; position: absolute"><?php echo "Hora de conexion:", $_SESSION['hora'] ?></a>
        </div>
    </div>
</nav>

<div style="margin-right: 78%;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset style="width: 1200px !important; margin-left: 5%;">
            <legend class="float-none w-auto px-3">Cambiar preferencias</legend>
            <label for="nombre" style="font-weight:bold;">Elige el color del fondo deseado</label>
            <div class="form-check">
                <input type="radio" name="color_fondo" value="white">
                <label class="radio-inline">
                    Blanco
                </label>
            </div>
            <div class="form-check">
                <input type="radio" name="color_fondo" value="green">
                <label class="radio-inline">
                    Verde
                </label>
            </div>
            <div class="form-check">
                <input type="radio" name="color_fondo" value="red">
                <label class="radio-inline">
                    Rojo
                </label>
            </div>
            <div class="form-check">
                <input type="radio" name="color_fondo" value="blue">
                <label class="radio-inline">
                    Azul
                </label>
            </div>
            <div class="form-check">
                <input type="radio" name="color_fondo" value="yellow">
                <label class="radio-inline">
                    Amarillo
                </label>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary form-control" type="submit" id="enviar" name="enviar" value="Cambiar" style="width: 15%;background-color: rgb(209, 207, 207); border-radius: 0; border-color: black; color: black; margin-right: 1%;">
                <input class="btn btn-primary form-control" type="submit" id="restablecer" name="restablecer" value="Restablecer" style="width: 15%;background-color: rgb(209, 207, 207); border-radius: 0; border-color: black; color: black;">
            </div>
        </fieldset>
    </form>
</div>
</body>

</html>