<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Visualizar la fecha actual en el siguiente formato</title>
</head>
<body>
<p>
        <?php
        
        $dia = date("d");
        $mes = date("m");
        $anio = date("Y");

        switch($mes) {
            case 1: $elMes = "Enero";
            break;
            case 2: $elMes = "Febrero";
            break;
            case 3: $elMes = "Marzo";
            break;
            case 4: $elMes = "Abril";
            break;
            case 5: $elMes = "Mayo";
            break;
            case 6: $elMes = "Junio";
            break;
            case 7: $elMes = "Julio";
            break;
            case 8: $elMes = "Agosto";
            break;
            case 9: $elMes = "Septiembre";
            break;
            case 10: $elMes = "Octubre";
            break;
            case 11: $elMes = "Noviembre";
            break;
            case 12: $elMes = "Diciembre";
            break;
        }

        printf("Hoy es %s de %s de %s",$dia,$elMes,$anio);
        
        
        ?>
    </p>
    
</body>
</html>