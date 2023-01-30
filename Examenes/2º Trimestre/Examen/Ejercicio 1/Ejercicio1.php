<?php
//POR ALEJANDRO RODRIGUEZ MENA
require_once('DB.php');
$db = new DB();


echo "Borrando todos los registros y haciendo una copia de seguridad en backup.json...\n";
$db->borrarConSeguridad();

echo "Recuperando datos de backup.json...\n";
$db->recuperarDatos();

echo "Registros actuales en la tabla: \n";
print_r($db->muestraRegitros());
