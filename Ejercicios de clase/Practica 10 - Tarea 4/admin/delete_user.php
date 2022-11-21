<?php
include "../inc/header.inc.php";

if (isset($_POST['del'])) {
    $login = $_POST['select_login'];
    $base = "conta2";
    $con = connection_bd($base);
    if ($login != 'daw') {
        $sql1 = "DELETE FROM usuarios WHERE login = '$login'";
        $sql2 = "DELETE FROM movimientos WHERE loginUsu = '$login'";
        operacionesMySql($sql1, $base);
        operacionesMySql($sql2, $base);
        $message = "<b>You have successfully deleted the user: $login</b>";
    } else {
        $message = "You can't delete the admin user";
    }
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
    <title>Pagina principal</title>
</head>

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
                <a href="../">Exit</a>
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
                    $conexion = connection_bd("conta2");
                    $query = "select * from usuarios";
                    $registros = $conexion->query($query) or die($conexion->error);
                    $row = $registros->fetch();
                    while ($row != null) {
                    ?>
                        <option value="<?php echo $row['login']; ?>"><?php echo $row['login']; ?></option>
                    <?php
                        $row = $registros->fetch();
                    }
                    $conexion = null;
                    ?>
                </select>

                <input type='submit' name='del' id='del' onclick="return confirm('¿Estas seguro que quieres eliminar la venta?')" value='Delete'>
                <input type="submit" value="Cancel">

                <?php
                if (isset($message)) {
                    echo "<div class='error'><b>$message</b></div>";
                }
                ?>
            </form>
        </fieldset>
    </main>
</body>

</html>