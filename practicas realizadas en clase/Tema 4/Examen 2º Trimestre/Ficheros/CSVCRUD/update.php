<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Actualizar CRUD JSON</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<?php
include "funciones.php";
$edit_id = $_GET['edit_id'];

$data = csvtoarray("miembro.csv",$delimitador = ",");
$row = $data[$edit_id];
?>
<?php
if(isset($_POST['btnUpdate']))
{
$estado=$_POST['textestado']==1?"Activo":"Inactivo";
$update_arr = array(
$_POST['txtid'],
$_POST['txtnombre'],
 $_POST['txtemail'],
 $_POST['txtelefono'],
$_POST['txtFecha'],
$estado
);
$data[$edit_id] = $update_arr;
write_csv($data, "miembro.csv");
header('location: index.php');
}
?>
 <div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Modificar Miembros</h2>
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
					<td><input type="text" name="txtid" value="<?php echo $row[0];?>"> </td>
					<td><input type="text" name="txtnombre" value="<?php echo $row[1];?>"> </td>
					 <td><input type="text" name="txtemail" value="<?php echo $row[2];?>"> </td>
					 <td><input type="text" name="txtelefono" value="<?php echo $row[3];?>">  </td>
					 <td><input type="datetime-local" name="txtFecha" value="<?php echo $row[4];?>"> </td>
					<td> 
						<select name="textestado">
						  <option value="1" <?php if ($row[5]=='Activo') echo "selected";?>>Activo</option>
						  <option value="0" <?php if ($row[5]=='Inactivo') echo "selected";?>>Inactivo</option>
						</select>
					</td>
					
				</tr>
				<tr><td colspan="5"></td><td><input type="submit" value="Actualizar" name="btnUpdate"> </td></tr>
				 </tbody>
            </table>
        </div>
    
		

</form>
</div>
</div>
 

</body>
</html>