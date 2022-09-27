<?php

function validarFecha($dia,$mes){
    switch($mes){
        case 2:
            if($dia > 28){
                $dia = rand(1,28);
            }
            break;
            #En los case, si el codigo es el mismo y se repite se puede dejar de la siguiente manera, hasta que llegue al proximo break
        case 4:
        case 6:
        case 9:
        case 11:
            if($dia > 28){
                $dia = rand(1,30);
            }
            break;
        }
        return $dia;
}

function fechaActual($dia,$mes,$anio) {
    
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
    $dia = validarFecha($dia,$mes);
    printf("Hoy es %s de %s de %s", $dia, $elMes, $anio);
}

?>
