<?php
//iConexión a la BD
include 'funciones.php';
	escribirJSONBD("miembros.json");
	header("Location:index.php");


?>