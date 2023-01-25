<?php

include "DB.php";
$db = new DB();
$db->conectaDb();
$db->borraTodo();
$db->insertaRegistro(1,"Juan", "Pérez");
$db->insertaRegistro(2,"Juan", "Pérez");
$db->insertaRegistro(3,"Juan", "Pérez");
$db->insertaRegistro(4,"Juan", "Pérez");
?>
<div style="display: flex; flex-wrap: wrap;">
  <div style="width: 30%; padding: 10px;">
    <h3>Registros: <?php echo $db->cuentaRegistros() ?></h3>
  </div>
  <div style="width: 70%; padding: 10px;">
    <pre><?php print_r($db->muestraRegistros()); ?></pre>
  </div>
</div>

<div style="display: flex; flex-wrap: wrap;">
  <div style="width: 50%; padding: 10px;">
    <?php echo $db->modificaRegistro(1, "Juan Carlos", "Pérez García"); ?>
  </div>
  <div style="width: 50%; padding: 10px;">
    <pre><?php print_r($db->muestraRegistros()); ?></pre>
  </div>
</div>