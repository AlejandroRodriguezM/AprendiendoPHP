<?php


//Visualizar tabla csv
function visualizarTablaCSV(){
	$fila=0;
	$gestor = fopen("miembro.csv", "r");

	if ($gestor !== FALSE) {
	while (($datos = fgetcsv($gestor, 100, ",")) !== FALSE) {
	  if($fila!=0){
		$numero = count($datos);
		echo "<tr>";
		for ($c=1; $c < $numero; $c++) {
			echo "<td>".$datos[$c] . "</td>";
			
		}
		echo "<td><a href='update.php?edit_id=$fila'class='btn btn-success pull-right'>Actualizar</a> </td>";
		echo "<td><a href='delete.php?delete_id=$fila'class='btn btn-success pull-right'>Borrar</a></td>";
		echo "</tr>";
	  }
	  $fila++;
	}
	if($fila==0)
		echo "<tr><td colspan='5'>No existe datos en el fichero</td></tr>";
	fclose($gestor);
	}else{
		echo "<tr><td colspan='5'>No existe el fichero</td></tr>";
	}
}

function csvtoarray($archivo,$delimitador = ","){

	if(!empty($archivo) && !empty($delimitador) && is_file($archivo)){

		$array_total = array();

		$fp = fopen($archivo,"r");

		while ($data = fgetcsv($fp, 10000, $delimitador)){

			$num = count($data);

			//$array_total[] = array_map("utf8_encode",$data);
			$array_total[] = $data;
		}

		fclose($fp);

		return $array_total;
	}
	else
		return false;

	

}

function write_csv($matriz_productos, $ruta_csv) {
	if( !file_exists( $ruta_csv ) ); 
		file_put_contents( $ruta_csv, '');
	$outputBuffer = fopen($ruta_csv, 'w');
	foreach($matriz_productos as $n_linea => $linea) {
		fputcsv($outputBuffer, $linea, ',', '"');
	}
	fclose($outputBuffer);
}

?>