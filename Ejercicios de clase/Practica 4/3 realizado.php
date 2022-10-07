<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 hecho por el profe</title>
    <link rel="stylesheet" href="style/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style/styles.css" type="text/css">
</head>

<body>
    <h1>recibir varios nombres de frutas</h1>
    <form action="3.php" method="post">
        <?php

        //si no he hecho un post pues hago el formulario
        if (!$_REQUEST) {
            echo "<label for= 'num'>¿Cuánta fruta deseas?</label>";
            echo "<input type='text' name='num'>";
            echo "<input type='submit' name='enviar' value='enviar'>";
            //si se ha ejecutado el post hará lo siguiente:
        } elseif (isset($_REQUEST['num'])) {
            echo "<form action='ejer3.php' method='post'>";
            $num = $_REQUEST['num'];
            for ($i = 0; $i < $num; $i++) {
                echo "Fruta " . $i . ":";
                echo "<input type='text' name='fruta[]' value=''><br>";
            }

            echo "<input type='submit' value='Enviar'>";
            echo "</form>";
        } else {
            foreach ($_REQUEST['fruta'] as $fruta) {
                echo "<p>Fruta recibida:$fruta</p>";
            }
        }


        ?>



    </form>


</body>

</html>