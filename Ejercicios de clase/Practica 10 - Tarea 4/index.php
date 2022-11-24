<?php
include "inc/header.inc.php";
//Comprobamos si ya se enviado el formulario
if (isset($_POST['acces'])) {
    echo "hola";
    $user = $_POST['user'];
    $password = $_POST['password'];
    $_SESSION['hora'] = date("H:i", time());
    //Obtenemos el password almacenado en la BD
    $password_bd = obtain_password($user);
    if (password_verify($password, $password_bd)) {
        session_start();
        setcookie('user', $user, time() + 3600);
        if (isset($_POST['form_user_login'])) {
            header("Location: ./user/index.php");
        } else if (isset($_POST['form_admin_login'])) {
            header("Location: ./admin/index.php");
        }
    } else {
        $error = errorSesion($user);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="shortcut icon" href="img/ico.png">
    <title>Pagina principal</title>
</head>

<body>

    <header>
        <h1 id="inicio">Gastos personales</h1>
    </header>
    <nav>Contabilidad personal</nav>
    <main>
        <fieldset class="mini-formulario">
            <legend>Login</legend>
            <?php
            if (isset($error)) {
                echo "<div class='error'>$error</div>";
            }
            if (empty($_COOKIE['error_admin'])) {
                echo "<div class='error'>Usuario bloqueado</div>";
            }
            ?>
            <form method="post">
                <div class="input-labeled">
                    <label>User:</label>
                    <input type="text" name="user" required maxlength="10">
                </div>


                <div class="input-labeled">
                    <label>Password:</label>
                    <input type="password" name="password" required maxlength="20">
                </div>
                <hr>
                <div class="left">
                    <input class='button_gestion' type="submit" name="form_user_login" value="Gestion de cuenta">
                    <input class='button_gestion' type="submit" name="form_admin_login" value="Gestionar Usuarios">
                    <input type="hidden" name="acces" id="acces">
                </div>
            </form>
        </fieldset>
    </main>
</body>

</html>