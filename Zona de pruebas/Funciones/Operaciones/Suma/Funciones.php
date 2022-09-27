<?php 

function sumar($num1,$num2) {
    $total = $num1 + $num2;
    return $total;
}

function restar($num1,$num2) {
    $total = $num1 - $num2;
    return $total;
}

function tabla($num2){
    $resultado = "";
    for ($i = 1; $i <= 10; $i++) { 
        $operacion = $i * $num2;
        $resultado .= $num2 ."x".$i .": ".$operacion ."<br>";
    }
    return $resultado;
}

function factorial($num1){
    $factor = 1;
    for ($i = 1; $i < $num1; $i++) { 
        $factor *= $i;
    }
    return $factor;
}

function mayorMenor($num1,$num2){
    if($num1 < $num2) {
        return $num1;
    }
    else {
        return $num2;
    } 
}






?>