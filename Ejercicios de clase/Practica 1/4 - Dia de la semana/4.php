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
    $control = "No esta activo";
    $dia = date("d");
    if ($dia > 10)
    {
        $control = "El servidor esta activo";
        echo "Control del servidor:",$control;
    }
    ?>
    
</body>
</html>