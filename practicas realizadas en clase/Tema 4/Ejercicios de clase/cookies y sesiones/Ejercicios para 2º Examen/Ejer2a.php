<!DOCTYPE html>
<html>
    <head>
        <title>Colores</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            if (isset($_GET['color'])){
                setcookie('color',$_GET['color']);
            }
        ?>
     <h1>Selección de colores</h1>
     <div>
        <label>
            Se ha elegido el color 
            <?php
                if (isset($_COOKIE['color'])){
                    print $_COOKIE['color']."<br>";
                }
            ?>
        </label>
        
        <label>Cambio de color</label>
        <a href="?color=red">Rojo</a>
        <a href="?color=blue">Azul</a>
        <a href="?color=green">Verde</a>
        <a href="?color=black">Ninguno</a>
        <br>
        <a href="Ejer2b.php">Ir a otra página para comprobar las cookies</a>
     </div>        
    </body>
</html>