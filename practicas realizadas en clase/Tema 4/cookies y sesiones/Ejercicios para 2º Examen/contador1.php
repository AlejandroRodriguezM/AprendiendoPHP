<!DOCTYPE html>
<html>
    <head>
        <title>Contador de visitas</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            if (isset($_POST['btReiniciar'])){
                setcookie('accesos',0,-1);
                header("Location:contador1.php");
            }else{
                $accesosPagina = 0;
                if (isset($_COOKIE['accesos'])) {
                    $accesosPagina = $_COOKIE['accesos']; // recuperamos una cookie
                    setcookie('accesos', ++$accesosPagina); // le asignamos un valor
                }
            }
         ?>
         
        <form method="POST" action="contador1.php">
        <label>
            <?php 
                if (isset($_COOKIE['accesos'])) {
                    print "Contador de visitas:$_COOKIE[accesos]";
                   
                }else{
                    setcookie('accesos',0);
                    print "Este es su primera visita";
                }

            ?>
        </label>
       
            <input type="submit" value="Reiniciar" name="btReiniciar">
        </form>
        
    </body>
</html>