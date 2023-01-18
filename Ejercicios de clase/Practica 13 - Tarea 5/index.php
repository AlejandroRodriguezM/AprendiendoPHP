<?php

include "./php/clases/ClaseDb.php";
include "./php/clases/Anunciantes.php";
if (isset($_COOKIE['loginUser']) || isset($_COOKIE['adminUser'])) {
    header('Location: inicio.php');
} else {
    session_start();
    session_destroy();
    $db = new ClaseDb();
    destroyCookiesUser();
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
    <title>Index</title>
</head>

<body>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <fieldset>
                <legend class="float-none w-auto px-3">Login</legend>
                <div class="mb-3">
                    <label for="nombre" style="font-weight:bold;">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" style="font-weight:bold;">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <input class="btn btn-primary form-control" id="enviar" name="enviar" type="submit" value="Enviar" style="width: 45%;background-color: rgb(209, 207, 207); border-radius: 0; border-color: black; color: black;">
                </div>
                <a href="registros.php">Registrarse</a>
                <br>
                <a href="invitados.php">Entrar como invitado</a>
                <?php
                if (isset($_POST['enviar'])) {
                    $login = $_POST['nombre'];
                    $password = $_POST['password'];
                    if (!empty($login) && !empty($password)) {
                        $usuario = new Anunciantes($login, $password, "", "");
                        $usuario->login_user($login, $password);
                    }
                }
                if (isset($_COOKIE['errorAdmin'])) {
                    echo $_COOKIE['errorAdmin'];
                    setcookie('errorAdmin', '', time() - 3600, "/");
                }
                if (isset($_COOKIE['login'])) {
                    echo $_COOKIE['errorLogin'];
                }
                ?>
            </fieldset>

        </form>
    </div>
</body>

</html>