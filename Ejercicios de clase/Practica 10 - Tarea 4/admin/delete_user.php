<?php
include "../inc/header.inc.php";

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
        <h1 id="inicio">Gastos personales</h1>
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
        &gt; Modify user
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
                    echo "<option name='login' value=''>User name</option>";
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
                    <input type='submit' name='del' id='del' onclick="return confirm('¿Estas seguro que quieres eliminar la venta?')" value='Eliminar'>
                    <input type='hidden' name='refProducto' id='refProducto' value='<?php echo $row['refProducto']; ?>'>
                    <input type="submit" value="Cancelar">
                <?php
                if (isset($error)) {
                    echo "<div class='error'><b>!</b>$error</div>";
                }
                ?>
            </form>
        </fieldset>
    </main>
</body>

</html>