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
        echo "El resultado de la suma es " .sumar($num1,$num2);
        ?>
   
    </p>
</body>

</html>