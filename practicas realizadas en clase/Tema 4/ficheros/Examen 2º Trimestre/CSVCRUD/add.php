<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD JSON Agregar</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<?php
include "funciones.php";
$archivo="miembro.csv";
if(isset($_POST['btnadd'])){
$data = csvtoarray($archivo,$delimitador = ",");
$datos=$data;
$estado=$_POST['textestado']==1?"Activo":"Inactivo";
$add_arr = array(
$_POST['txtid'],
$_POST['txtnombre'],
$_POST['txtemail'],
$_POST['txtelefono'],
$_POST['txtFecha'],
$estado
);
$data[] = $add_arr;

//buscar si id repetido
 $buscar=$_POST['txtid'];
 $encontrado=false;

 foreach($datos as $miembro){
	 if($miembro[0]==$buscar)
		 $encontrado=true;
 }	
 if (!$encontrado){
	//Escribir en el fichero
	write_csv($data, $archivo);
	}
	header("location:index.php");
}
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Agregar Miembros</h2>
        </div>
<form method="post" name="frmAdd">  
		<div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
					  <th>Identificador</th>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Telefono</th>
                      <th>Creado</th>
                      <th>Estado</th>
					</tr>
                </thead>
                <tbody>
				<tr>
					<td><input type="text" name="txtid"> </td>
					<td><input type="text" name="txtnombre"> </td>
					 <td><input type="text" name="txtemail"> </td>
					 <td><input type="text" name="txtelefono">  </td>
					 <td><input type="datetime-local" name="txtFecha"> </td>
					<td> 
						<select name="textestado">
						  <option value="1">Activo</option>
						  <option value="0" selected>Inactivo</option>
						</select>
					</td>
					
				</tr>
				<tr><td colspan="5"></td><td><input type="submit" value="Insertar" name="btnadd"> </td></tr>
				 </tbody>
            </table>
        </div>
    
		

</form>
</div>
</div>

</body>
</html>