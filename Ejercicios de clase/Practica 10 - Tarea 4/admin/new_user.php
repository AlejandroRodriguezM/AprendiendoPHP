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
        &gt; New user
    </nav>
    <main>
        <fieldset class="mini-formulario">
            <legend>Datos Nuevo Usuario</legend>
            <?php
            if (!empty($error)) {
                echo "<div class='error'><b>!</b>$error</div>";
            }
            if (!empty($correcto)) {
                echo "<div class='correcto'><b>!</b>$correcto</div>";
            }
            ?>
            <form method="post" action="?<?php echo $fakeCookie; ?>">
                <div class="input-labeled">
                    <label>Login:</label>
                    <input type="text" name="newUser[login]" required maxlength="10" value="<?php  ?>">
                </div>
                <div class="input-labeled">
                    <label>Clave:</label>
                    <input type="password" name="newUser[password]" required maxlength="20" value="<?php  ?>">
                </div>
                <div class="input-labeled">
                    <label>Repite Clave:</label>
                    <input type="password" name="newUser[repassword]" required maxlength="20" value="<?php  ?>">
                </div>
                <div class="input-labeled">
                    <label>Nombre:</label>
                    <input type="text" name="newUser[nombre]" required maxlength="30" value="<?php  ?>">
                </div>
                <div class="input-labeled">
                    <label>Fecha Nacimiento:</label>
                    <input type="date" name="newUser[fNacimiento]" placeholder="aaaa-mm-dd" required maxlength="10" value="<?php  ?>">
                </div>
                <div class="input-labeled">
                    <label>Presupuesto:</label>
                    <input type="text" name="newUser[presupuesto]" required maxlength="30" value="<?php  ?>">
                </div>
                <input type="submit" name="form_new_user" value="Create user">
            </form>
        </fieldset>
    </main>
</body>

</html>