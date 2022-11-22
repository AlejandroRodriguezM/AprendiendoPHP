<?php
include "inc/header.inc.php";
//Comprobamos si ya se enviado el formulario
if (isset($_POST['form_user_login'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    //Obtenemos el password almacenado en la BD
    $password_bd = obtain_password($user);
    //Comprobamo las credenciales con la BD
    //password_verify encripta el primer parametro y compara
    // echo password_hash("daw", PASSWORD_DEFAULT);
    if (password_verify($password, $password_bd)) {
        session_start();
        $_SESSION['usuario'] = $user;
        $_SESSION['hora'] = date("H:i", time());
        // header("Location: ./user/index.php");
    } else {
        //utilizamos una cookie para controlar el usuario y fallos
        if (!isset($_COOKIE['login'])) {
            $num_fallos = 1;
            setcookie('login', $user, time() + 3600);
            setcookie('num_fallos', $num_fallos, time() + 3600);
            $error = "Contraseña incorrecta primer intento, al tercero se bloquea";
        } else if ($_COOKIE['num_fallos'] == 1 && $_COOKIE['login'] == $user) {
            $num_fallos = 2;
            setcookie('login', $user, time() + 3600);
            setcookie('num_fallos', $num_fallos, time() + 3600);
            $error = "Contraseña incorrecta segundo intento, al tercero se bloquea";
        } else if ($_COOKIE['num_fallos'] == 1 && $_COOKIE['login'] != $user) {
            $num_fallos = 1;
            setcookie('login', $user, time() + 3600);
            setcookie('num_fallos', $num_fallos, time() + 3600);
            $error = "Contraseña incorrecta primer intento, al tercero se bloquea";
        } else if ($_COOKIE['num_fallos'] == 2 && $_COOKIE['login'] == $user) {
            setcookie('login', null, -1);
            setcookie('num_fallos', null, -1);
            header("Location: index.php");
        } else if ($_COOKIE['num_fallos'] == 2 && $_COOKIE['login'] != $user) {
            $num_fallos = 1;
            setcookie('login', $user, time() + 3600);
            setcookie('num_fallos', $num_fallos, time() + 3600);
            $error = "Contraseña incorrecta primer intento, al tercero se bloquea";
        }
    }
} else if (isset($_POST['form_admin_login'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    //Obtenemos el password almacenado en la BD
    $password_bd = obtain_password($user);
    //password_verify encripta el primer parametro y compara
    
    //Creamos una coockie para el admin

    if (password_verify($password, $password_bd)) {
        session_start();
        $_SESSION['usuario'] = $user;
        $_SESSION['hora'] = date("H:i", time());
        header("Location: ./admin/index.php");
    } else {
        $error = "Contraseña incorrecta en cuenta de administrador";
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
                </div>

                <div class="left">
                    <input class='button_gestion' type="submit" name="form_admin_login" value="Gestionar Usuarios">
                </div>
            </form>
        </fieldset>
    </main>
</body>

</html>