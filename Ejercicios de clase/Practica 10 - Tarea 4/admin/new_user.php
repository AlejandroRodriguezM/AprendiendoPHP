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
    <title>Create new user</title>
</head>
<?php
if (isset($_POST['create'])) {
    $password = $_POST['password'];
    $rePassword = $_POST['repassword'];
    if (strcmp($password, $rePassword) === 0) {
        $login = $_POST['login'];
        $query = "select login from usuarios where login = '$login'";
        if (checkData($query)) {
            $pass_encrypted = password_hash($password, PASSWORD_DEFAULT);
            $name = $_POST['user_name'];
            $bornDate = $_POST['born_date'];
            $budget = $_POST['budget'];
            $sql = "INSERT INTO usuarios (login, password, nombre, fNacimiento, presupuesto) VALUES ('$login', '$pass_encrypted', '$name', '$bornDate', '$budget')";
            operacionesMySql($sql);
            $message = "<b>You have successfully created the user: $login</b>";
        } else {
            $message = "The user: $login Already exists";
        }
    } else {
        $message = "Passwords don't match";
    }
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
            <a href="index.php?<?php echo $fakeCookie; ?>">Manage users</a>
            <div>
                <a href="new_user.php?<?php  ?>">New user</a>
                <a href="modify_user.php?<?php  ?>">Modify user</a>
                <a href="delete_user.php?<?php  ?>">Delete user</a>
                <a href="../<?php setcookie('user', $user, time() - 3600); ?>">Exit</a>
            </div>
        </span>
        &gt; New user
    </nav>
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
                if (isset($message)) {
                    echo "<div class='error'><b>$message</b></div>";
                }
                ?>
            </form>
        </fieldset>
    </main>
</body>

</html>