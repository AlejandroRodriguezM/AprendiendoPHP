<?php
include "../inc/header.inc.php";
session_start();
//comprobamos que el usuario existe
if (!isset($_SESSION['usuario'])) {
    die("Error - You have to <a href='../index.php'>Log in</a>");
}

if (isset($_COOKIE['admin'])) {
    protegeAccesoAdmin($redirect = "../");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="shortcut icon" href="img/ico.png">
    <title>Delete User</title>
</head>
<?php
if (isset($_POST['del'])) {
    $login = $_POST['select_login'];
    $base = "conta2";
    $tabla = getMovimientos(true);
    $numMovimientos = count($tabla);
    if ($login != 'daw') {

        $sql1 = "DELETE FROM usuarios WHERE login = '$login'";
        operacionesMySql($sql1);
        if ($numMovimientos > 0) {
            $sql2 = "DELETE FROM movimientos WHERE loginUsu = '$login'";
            operacionesMySql($sql2);
        }
        $message = "<b>You have successfully deleted the user: $login</b>";
        setcookie("del_message", $message, time() + 3600);
    } else {
        $message = "You can't delete the admin user";
        setcookie("del_message", $message, time() + 3600);
    }
    header("Location: delete_user.php");
}

if(isset($_POST['cancel'])){
    header("Location: index.php");
    setcookie("del_message", $message, time() - 3600);
}
?>

<body>

    <header>
        <h1 id="inicio">Personal expenses</h1>
    </header>
    <nav>
        <span class="desplegable">
            <a href="./?<?php echo $fakeCookie; ?>">Manage users</a>
            <div>
                <a href="new_user.php?<?php  ?>">New user</a>
                <a href="modify_user.php?<?php  ?>">Modify user</a>
                <a href="delete_user.php?<?php  ?>">Delete user</a>
                <a href="../<?php setcookie('user', $user, time() - 3600); ?>">Exit</a>
            </div>
        </span>
        &gt; Delete user
    </nav>

    <main>
        <fieldset class="mini-formulario">
            <legend>Delete User</legend>
            <?php
            if (isset($correcto)) {
                echo "<div class='correcto'><b>!</b>$correcto</div>";
            }

            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label>Select User</label>
                <select name='select_login' id='login_user'>
                    <?php
                    echo "<option name='select_login' value=''>User name</option>";
                    $listaLogin = getLoginsList();
                    foreach ($listaLogin as $login) {
                        echo "<option name='select_login' value='$login'>$login</option>";
                    }
                    ?>
                </select>

                <input type='submit' name='del' id='del' onclick="return confirm('¿Estas seguro que quieres eliminar la venta?')" value='Delete'>
                <input type="submit" name='cancel' id='cancel' value="Cancel">

                <?php
                if (isset($_COOKIE['del_message'])) {
                    echo "<b>" . $_COOKIE['del_message'] . "</b><br>";
                }
                ?>
            </form>
        </fieldset>
    </main>
</body>

</html>