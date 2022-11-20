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
            <legend>Iniciar Sesión</legend>
            <?php
            if (isset($error)) {
                echo "<div class='error'>$error</div>";
            }
            ?>
            <form method="post">
                <div class="input-labeled">
                    <label>Usuario:</label>
                    <input type="text" name="usuario" required maxlength="10">
                </div>


                <div class="input-labeled">
                    <label>Clave:</label>
                    <input type="password" name="clave" required maxlength="20">
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