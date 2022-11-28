<?php
include "../inc/header.inc.php";
session_start();
//comprobamos que el usuario existe
if (!isset($_SESSION['usuario'])) {
    die("Error - You have to <a href='../index.php'>Log in</a>");
}

if (isset($_COOKIE['user']) && isset($_COOKIE['pass']) && isset($_COOKIE['admin'])) {
    $user = $_COOKIE['user'];
    $pass = $_COOKIE['pass'];
    protectAcces($user, $pass);
} else {
    die("Error - You have to <a href='../index.php'>Log in</a>");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="shortcut icon" href="../img/ico.png">
    <title>Pagina principal</title>
</head>
<?php
include "../inc/header.inc.php";

if (isset($_POST['select'])) {
    if ($_POST['select_login'] == "User name") {
        $message = "<b>You have to select a user</b>";
        setcookie("mod_message", $message, time() + 3600,'/');
        header("Location: modify_user.php");
    } else {
        $login = $_POST['select_login'];
        $array = getUserData($login);
        $name = $array['nombre'];
        $bornDate = $array['fNacimiento'];
        $budget = $array['presupuesto'];
        $password = $array['password'];
    }
}

if (isset($_POST['mod'])) {
    $login = $_POST['login'];
    $name = $_POST['user_name'];
    $bornDate = $_POST['born_date'];
    $password = $_POST['password'];
    $rePassword = $_POST['repassword'];
    if (strcmp($password, $rePassword) === 0) {
        $pass_encrypted = password_hash($password, PASSWORD_DEFAULT);
        $datosUsuario = array(
            'login' => $login,
            'nombre' => $name,
            'fNacimiento' => $bornDate,
            'presupuesto' => $budget,
            'password' => $pass_encrypted
        );
        if (updateUser($datosUsuario)) {
            $message = "<div class='mens_ok'><b>You have successfully modified the user: $login</b></div>";
        } else {
            $message = "<div class='mens_error'><b>There was an error modifying the user: $login</b></div>";
        }
    } else {
        $message = "<div class='mens_error'><b>The passwords do not match</b></div>";
    }
    setcookie("mod_message", $message, time() + 3600, '/');
    header("Location: modify_user.php");
}

if (isset($_POST['cancel'])) {
    setcookie("mod_message", $message, time() - 3600, '/');
    header("Location: index.php");
}
?>

<body>
    <header>
        <h1 id="inicio">Personal Budget</h1>
        <div id="nombre-usuario-cabecera">
            <i>Welcome</i> <b><?php echo $_SESSION['usuario']; ?></b>
        </div>
    </header>
    <nav>
        <span class="desplegable">
            <a href="./?<?php ?>">Manage users</a>
            <div>
                <a href="new_user.php?">New user</a>
                <a href="modify_user.php?">Modify user</a>
                <a href="delete_user.php?">Delete user</a>
                <a href="../logOut.php">Exit</a>
            </div>
        </span>
        &gt; Modify user
    </nav>
    <div id="nombre-usuario-cabecera">
        <i>Welcome</i> <b><?php echo $_SESSION['usuario']; ?></b>
    </div>
    <fieldset class="mini-formulario">
        <legend>Modify User Data</legend>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Select User</label>
            <select name='select_login' id='user_login'>
                <?php
                echo "<option name='select_login' value='User name'>User name</option>";
                $listaLogin = getLoginsList();
                foreach ($listaLogin as $loginUser) {
                    echo "<option name='select_login' value='$loginUser'>$loginUser</option>";
                }
                ?>
            </select>
            <input type="submit" name='select' id='select' value="Upload User Data">

            <hr>
            <?php
            if (isset($_POST['select'])) {

                echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
            ?>
                <div class="input-labeled">
                    <label>Login:</label>
                    <input type="text" name="login" readonly value="<?php echo $login ?>">
                </div>
                <div class="input-labeled">
                    <label>Password:</label>
                    <input type="password" name="password" placeholder="**********" maxlength="20" value="">
                </div>
                <div class="input-labeled">
                    <label>Repite password:</label>
                    <input type="password" name="repassword" placeholder="**********" maxlength="20" value="">
                </div>
                <div class="input-labeled">
                <label>Name:</label>
                    <input type="text" name="user_name" maxlength="30" pattern="[a-zA-Z]+" required value="<?php echo $name ?>"">
                </div>
                <div class="input-labeled">
                    <label>Born date:</label>
                    <input type="date" name="born_date" placeholder="aaaa-mm-dd" min="1932-01-01" max="2006-01-01" maxlength="10" value="<?php echo $bornDate  ?>" required">
                </div>
                <input type="submit" name="mod" id="mod" value="Guardar">
            <?php  } ?>
            <input type="submit" name='cancel' id='cancel' value="Return to menu">
            <?php
            if (isset($_COOKIE['mod_message'])) {
                echo $_COOKIE['mod_message'];
                setcookie("mod_message", '', time() - 3600, '/');
            }
            ?>
        </form>
    </fieldset>
    </main>
</body>

</html>