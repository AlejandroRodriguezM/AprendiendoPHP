<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repaso Arrays</title>
</head>

<body>

    <?php
        include "funciones.php";

        if(isset($_POST['nombre'])){
            $nombre=$_POST['nombre'];
        }else{
            $nombre="";
        }

        if(isset($_POST['primerApellido'])){
            $p1=$_POST['primerApellido'];
        }else{
            $p1="";
        }

        if(isset($_POST['segundoApellido'])){
            $p2=$_POST['segundoApellido'];
        }else{
            $p2="";
        }

        if(isset($_POST['email'])){
            $email=$_POST['email'];
        }else{
            $email="";
        }

        if(isset($_POST['anyoNacimiento'])){
            $anyo=$_POST['anyoNacimiento'];
        }else{
            $anyo="";
        }

        if(isset($_POST['telefono'])){
            $telefono=$_POST['telefono'];
        }else{
            $telefono="";
        }

        if(!empty($_POST['copia'])){
            $agenda=explode(",",$_POST['copia']);
        }else{
            $agenda=array();
        }

        if(isset($_POST['enviar'])){
            $agenda=insertar_datos($_POST['nombre'],$_POST['primerApellido'],$_POST['segundoApellido'],$_POST['email'],$_POST['anyoNacimiento'],$_POST['telefono'],$agenda);
        }

        mostrar_tabla($agenda);

        $nombre=$p1=$p2=$email=$anyo=$telefono="";
    ?>

    <form action="" method="post">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre ?>">
        <label for="">Primer apellido:</label>
        <input type="text" name="primerApellido" value="<?php echo $p1 ?>">
        <label for="">Segundo Apellido:</label>
        <input type="text" name="segundoApellido" value="<?php echo $p2 ?>">
        <label for="">Email:</label>
        <input type="text" name="email" value="<?php echo $email ?>">
        <label for="">Año de nacimiento</label>
        <input type="text" name="anyoNacimiento" value="<?php echo $anyo ?>">
        <label for="">Telefono:</label>
        <input type="text" name="telefono" value="<?php echo $telefono ?>">
        <input type="submit" name="enviar">

        <input name="copia" type="hidden" value="<?php if (isset($agenda)) echo implode(",",$agenda);?>">
    </form>
</body>

</html>