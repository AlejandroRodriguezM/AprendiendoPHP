<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>
<?php
  include ("funciones.php");
  if(!isset($_POST['bot_actualizar'])){
    $id=$_GET['id'];
    $nom=$_GET['nom'];
    $apel=$_GET['apel'];
    $dir=$_GET['dir'];
  }else{
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $apel=$_POST['ape'];
    $dir=$_POST['dir'];
    $base="test";
    $query="update datos_usuarios set nombre='$nom',apellidos='$apel',direccion='$dir' where id=$id";
    operacionTransaccion($query,$base);
    header("Location:index.php");
  }
?>
<h1>ACTUALIZAR</h1>

<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $apel; ?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir" value="<?php echo $dir; ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>