<?php 
session_start();
include '../includes/config.php'; 
/* Comprobar la conexión*/ 
   $id = $_GET['id'];
   $titulo=$_POST['titulo'];
   $categoria=$_POST['categoria'];
   $contenido=addslashes($_POST['contenido']);
   $imagen= $_POST['imagen'];
   $user=$_SESSION['usuario'];
   
      $sql = sprintf("UPDATE articulos SET titulo = '$titulo', categoria = '$categoria', contenido = '$contenido', imagen= '$imagen', autor='$user' 
                      WHERE id = '$id'");
       $res = mysqli_query($conn,$sql);
         if (!$res){ die('Invalid query: ' . mysql_error());
       }else{
        echo  "<script type='text/javascript'>alert('Artículo actualizado correctamente');</script>";
        
      };
      header('location:index.php');
    ?>