<?php
include "../inc/header.inc.php";
session_start();
//comprobamos que el usuario existe
if (!isset($_SESSION['usuario'])) {
    die("Error - You have to <a href='../index.php'>Log in</a>");
}

if (isset($_COOKIE['user']) and isset($_COOKIE['pass'])) {
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
    <link rel="shortcut icon" href="img/ico.png">
    <title>Create new user</title>
</head>
<?php
if (isset($_POST['create'])) {
    $password = $_POST['password'];
    $rePassword = $_POST['repassword'];
    if (strcmp($password, $rePassword) === 0) {
        $login = $_POST['login'];
        $userStatus = getUserData($login);
        if (checkData($userStatus)) {
            $pass_encrypted = password_hash($password, PASSWORD_DEFAULT);
            $name = $_POST['user_name'];
            $bornDate = $_POST['born_date'];
            $budget = $_POST['budget'];
            if ($budget < 0) {
                $budget = 0;
            }
            $datosUsuario = array(
                'login' => $login,
                'nombre' => $name,
                'fNacimiento' => $bornDate,
                'presupuesto' => $budget,
                'password' => $pass_encrypted
            );
            if (newUser($datosUsuario)) {
                $message = "<b>You have successfully created the user: $login</b>";
            } else {
                $message = "<b>There was an error creating the user: $login</b>";
            }
        } else {
            $message = "The user: $login Already exists";
        }
    } else {
        $message = "Passwords don't match";
    }
    setcookie("newUser", $message, time() + 3600, '/');
}

if (isset($_POST['cancel'])) {
    header("Location: index.php");
}
?>

<body>

    <header>
        <h1 id="inicio">Creating new Users</h1>
    </header>
    <nav>
        <span class="desplegable">
            <a href="index.php?<?php ?>">Manage users</a>
            <div>
                <a href="new_user.php?<?php  ?>">New user</a>
                <a href="modify_user.php?<?php  ?>">Modify user</a>
                <a href="delete_user.php?<?php  ?>">Delete user</a>
                <a href="../<?php ?>">Exit</a>
            </div>
        </span>
        &gt; New user
    </nav>
    <div id="nombre-usuario-cabecera">
        <i>Welcome</i> <b><?php echo $_SESSION['usuario']; ?></b>
    </div>
    <main>
        <fieldset class="mini-formulario">
            <legend>Data New User</legend>
            <?php
            if (!empty($error)) {
                echo "<div class='error'><b>!</b>$error</div>";
            }
            if (!empty($correcto)) {
                echo "<div class='correcto'><b>!</b>$correcto</div>";
            }
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="input-labeled">
                    <label>Login:</label>
                    <input type="text" name="login" maxlength="20" value="<?php ?>">
                </div>
                <div class="input-labeled">
                    <label>New password:</label>
                    <input type="password" name="password" maxlength="128" value="<?php ?>">
                </div>
                <div class="input-labeled">
                    <label>Repite new password:</label>
                    <input type="password" name="repassword" maxlength="128" value="<?php ?>">
                </div>
                <div class="input-labeled">
                    <label>Name:</label>
                    <input type="text" name="user_name" maxlength="30" value="<?php  ?>">
                </div>
                <div class="input-labeled">
                    <label>Fecha Nacimiento:</label>
                    <input type="date" name="born_date" placeholder="aaaa-mm-dd" maxlength="10" value="<?php  ?>">
                </div>
                <div class="input-labeled">
                    <label>Budget:</label>
                    <input type="number" name="budget" maxlength="30" value="<?php  ?>">
                </div>
                <input type="submit" name="create" id='create' onclick="return confirm('Are you sure you want to add a new user?')" value="Create user">
                <input type="submit" name='cancel' id='cancel' value="Cancel">
                <?php
                if (isset($_COOKIE['newUser'])) {
                    echo "</div><b>" . $_COOKIE['newUser']. "</b></div>";
                    setcookie("mod_message", '', time() - 3600, '/');
                }
                ?>
            </form>
        </fieldset>
    </main>
</body>

</html>