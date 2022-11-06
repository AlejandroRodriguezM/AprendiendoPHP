<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Document</title>
</head>

<body>
    <p>
        <?php

        include "Funciones.php";
        $num1 = $_POST["num1"];
        $num2 = $_REQUEST["num2"]; #request es el que mas se usa.
        if ($_REQUEST['operacion'] == 'sumar') {
            echo "El resultado de la suma es " . sumar($num1, $num2)."<br>";
        }
        else {
            echo "El resultado de la resta es " . restar($num1, $num2)."<br>";
        }
        if($_REQUEST['factorial'] == 'factorial') {
            echo "El factorial de $num1 es ". factorial($num1)."<br>";
        }
        if($_REQUEST['tabla'] == 'tabla') {
            echo "la tabla de $num2 es ".tabla($num2)."<br>";
        }
        if($_REQUEST['mayormenor'] == "Mayor") {
            echo "El numero mayor es: "."<br>".mayorMenor($num1,$num2)."<br>";
        }
        if($_REQUEST['mayormenor'] == "Menor") {
            echo "El numero menor es ".mayorMenor($num1,$num2)."<br>";
        }
        ?>

    </p>
</body>

</html>