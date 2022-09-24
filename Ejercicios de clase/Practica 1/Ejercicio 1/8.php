<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Visualizar la fecha actual</title> 
</head>
<body>
    <p>
        <?php
        
        $dia = date("d");
        $mes = date("M");
        $anio = date("Y");

        printf("Fecha actual: %s-%s-%s",$dia,$mes,$anio);
        
        
        ?>
    </p>
    
</body>
</html>