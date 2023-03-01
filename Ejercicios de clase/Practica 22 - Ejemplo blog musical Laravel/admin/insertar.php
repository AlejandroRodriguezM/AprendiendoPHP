<?php 
session_start();
include '../includes/config.php'; 
/* Comprobar la conexión*/ 
   //$id = $_GET['id'];
   $titulo=$_POST['titulo'];
   $categoria=$_POST['categoria'];
   $contenido=addslashes($_POST['contenido']);
   $imagen= $_POST['imagen'];
   $user=$_SESSION['usuario'];

      $sql = sprintf("INSERT INTO articulos (titulo, categoria, contenido, imagen, fecha,autor) 
              VALUES ('".$titulo."','".$categoria."','".$contenido."','".$imagen."', '".date("Y-m-d H:i:s")."','".$user."')");
      $res = mysqli_query($conn,$sql);
        if (!$res) die('Consulta errónea: ' .mysql_error());
        $new_id = mysqli_insert_id($conn);
        if ($new_id) echo "<script type='text/javascript'>alert('Artículo publicado correctamente');</script>"; 
        header('location:index.php');
?>  