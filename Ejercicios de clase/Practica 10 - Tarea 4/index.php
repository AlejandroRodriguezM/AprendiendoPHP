<?php
include "inc/header.inc.php";

if (isset($_POST['acces'])) {
    $user = $_POST['user'];
    $pass = $_POST['password'];
    $_SESSION['hora'] = date("H:i", time());
    $password_bd = obtain_password($user);

    if (password_verify($pass, $password_bd)) {
        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['hour'] = date("H:i", time());
        createCookieUser($user, $password_bd);

        if (isset($_POST['form_user_login'])) {
            header("Location: ./user/index.php");
        }

        if (isset($_POST['form_admin_login'])) {
            createCookieAdmin($user);
            if (checkUserAdmin($user, $password_bd)) {
                header("Location: ./admin/index.php");
            } else {
                errorSesion($user);
            }
        }
    } else {
        errorSesion($user);
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
        <fieldset class="mini-form">
            <legend>Login</legend>
            <?php
            if (isset($_COOKIE['errorAdmin'])) {
                echo "<div class='mens_error'>" . $_COOKIE['errorAdmin'] . "</div>";
                setcookie('errorAdmin', '', time() - 3600, "/");
            }
            if (isset($_COOKIE['login'])) {
                echo "<div class='mens_error'>" . $_COOKIE['errorLogin'] . "</div>";
            }

            ?>
            <form method="post">
                <div class="input-labeled">
                    <label>User:</label>
                    <input type="text" name="user" required maxlength="10" placeholder="Enter your login">
                </div>
                <div class="input-labeled">
                    <label>Password:</label>
                    <input type="password" name="password" required maxlength="20" placeholder="Enter your password">
                </div>
                <hr>
                <div class="left">
                    <input class='login_button' type="submit" name="form_user_login" value="Manage account">
                    <input class='login_button' type="submit" name="form_admin_login" value="Manage Users">
                    <input type="hidden" name="acces" id="acces">
                </div>
            </form>
        </fieldset>
    </main>
</body>

</html>