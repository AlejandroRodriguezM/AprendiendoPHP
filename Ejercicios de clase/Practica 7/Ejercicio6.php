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

    $numero = rand(1, 100);

    $intentos = 0;

    echo $numero;
    
    if (isset($_POST['enviar'])) {
        $numeroIntroducido = $_POST['numeroUsuario'];
        $intentos++;
        do {
            if ($numeroIntroducido == $numero) {
                echo "Has acertado el número en $intentos intentos";
            } else if ($numeroIntroducido > $numero) {
                echo "<br>El número introducido es mayor que el número a adivinar<br>";
            } else if ($numeroIntroducido < $numero) {
                echo "El número introducido es menor que el número a adivinar";
            }
        } while ($numero != $numeroIntroducido);
    }
    ?>

    <form action="Ejercicio6.php" method="post">
        <input type="number" name="numeroUsuario" id="numeroUsuario">
        <input type="submit" name="enviar" value="Enviar">
    </form>


</body>

</html>