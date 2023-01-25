<?php
include_once "./Carta.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if(isset($_POST['mostrar'])){
        $carta = new Carta('');
        echo $carta->generarCarta();
    }
    ?>
    <!-- //create button -->
    <form action="" method="post">
        <input type="submit" name="mostrar" value="Generar carta" name="generar_carta">
    </form>
</body>

</html>