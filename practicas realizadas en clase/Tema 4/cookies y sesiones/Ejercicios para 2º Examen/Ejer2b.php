<!DOCTYPE html>
<html>
    <head>
        <title>Colores</title>
        <meta charset="utf-8">
        <style>
            body,a{
                color:
                <?php
                    if(isset($_COOKIE['color'])){
                        echo $_COOKIE['color'];
                    }
                ?>;
            }
        </style>
    </head>
    <body>
     <h1>Selección de colores(Comprobación)</h1>
     <div>
         <a href="Ejer2a.php">Volver a la página principal</a>
     </div>        
    </body>
</html>