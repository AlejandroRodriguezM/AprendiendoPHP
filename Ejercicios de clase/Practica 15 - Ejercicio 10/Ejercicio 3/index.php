<?php
include "ArrayReales.php";
// archivo de pruebas
$valores = array();
for ($i=0; $i < 5; $i++) { 
    $valores[] = rand(1,100);
}
$arrayReales = new ArrayReales($valores);

echo "Valores aleatorios : " . implode(",",$valores)."\n";
echo "Valor mínimo: " . $arrayReales->minimo() . "\n";
echo "Valor máximo: " . $arrayReales->maximo() . "\n";
echo "Sumatorio: " . $arrayReales->sumatorio() . "\n";