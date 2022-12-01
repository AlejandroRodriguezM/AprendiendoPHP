<!DOCTYPE html>
<html>
    <head>
        <title>Contador de visitas</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            $accesosPagina = 0;
            if (isset($_COOKIE['accesos'])) {
             $accesosPagina = $_COOKIE['accesos']; // recuperamos una cookie
             setcookie('accesos', ++$accesosPagina); // le asignamos un valor
            }
        ?>
        <label>
            Contador de visitas:
            <?php 
                if (!isset($_COOKIE['accesos'])) {
                    setcookie('accesos',0);
                   
                }
                print $_COOKIE['accesos'];
            ?>
        </label>
    </body>
</html>