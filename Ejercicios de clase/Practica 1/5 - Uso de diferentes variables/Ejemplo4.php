<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Fecha actual</h1>
    <?php 
    $dia = date("d");
    $mes = date("m");
    $anio = date("Y");
    switch($mes) {
        case 1: $nMes = "Enero";
        break;
        case 2: $nMes = "Febrero";
        break;
        case 3: $nMes = "Marzo";
        break;
        case 4: $nMes = "Abril";
        break;
        case 5: $nMes = "Mayo";
        break;
        case 6: $nMes = "Junio";
        break;
        case 7: $nMes = "Julio";
        break;
        case 8: $nMes = "Agosto";
        break;
        case 9: $nMes = "Septiembre";
        break;
        case 10: $nMes = "Octubre";
        break;
        case 11: $nMes = "Noviembre";
        break;
        case 12: $nMes = "Diciembre";
        break;

    }
    #echo "Fecha actual: ".$dia."-".$mes."-".$anio;    
    #printf("<br>Fecha actual: %d-%d-%d",$dia,$mes,$anio);
    printf("<br>Hoy es %d de %s del año %d",$dia,$nMes,$anio);
    ?>
    
</body>
</html>