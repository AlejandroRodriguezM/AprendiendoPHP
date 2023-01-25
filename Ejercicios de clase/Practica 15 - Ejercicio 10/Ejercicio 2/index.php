<?php 
// Ejemplo de uso:
$db = new DB();
$db->conectaDb();
$db->borraTodo();
$db->insertaRegistro("Juan", "Pérez");
echo "Registros: " . $db->cuentaRegistros() . "\n";
print_r($db->muestraRegistros());
$db->modificaRegistro(1, "Juan Carlos", "Pérez García");
print_r($db->muestraRegistros());
$db->insertaRegistro("Maria", "Garcia");
echo "Registros: " . $db->cuentaRegistros() . "\n";
print_r($db->muestraRegistros());
$db->borraRegistros(1);
echo "Registros: " . $db->cuentaRegistros() . "\n";
print_r($db->muestraRegistros());