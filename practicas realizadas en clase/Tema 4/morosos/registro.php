<?php
    include 'funciones.inc.php';
    $datos_correctos=false;
    if(isset($_POST['enviar'])){
        $login=$_POST['usuario'];
        $password=$_POST['password'];
        $password2=$_POST['password2'];
        $email=$_POST['email'];

        $error="";
        //validación de campos
        if(empty($login)||empty($password)||empty($password2)||empty($email)){
            $error = $error."Debe de completar todos los campos.<br>";
        }else{
            //Conexion a la base de datos
            $con=conexion_bd("morosos");
            //Comprobar si login existe en la base de datos
            if(existe_login($login,$con))
                $error .="El login elegido ya existe en la BD.<br>";
            //Comprobar que las passwords coinciden
            if(strcmp($password,$password2)!=0)
                $error .="Las contraseñas deben ser iguales.<br>";
            //La contraseña debe tener 6 o mas caracteres
            if(!comprueba_tamanio_contrasenia($password))
                $error .="La contraseña debe tener un mínimo de 6 caracteres.<br>";
            //Comprobar que la contraseña tenga una letra minuscula por lo menos
            if(!comprueba_minus_contrasenia($password))
                $error .="La contraseña debe tener minusculas.<br>";
            //Comprobar que la contraseña tenga una letra mayusculas por lo menos
            if(!comprueba_mayus_contrasenia($password))
                $error .="La contraseña debe tener mayusculas.<br>";
            //Comprobar que tiene numeros la contraseña
            if(!comprueba_num_contrasenia($password))
                $error .="La contraseña debe tener números.<br>";
            //Comprobar que la dirección de email es correcta
            If(!validar_email($email))
                $error .="El email introducido no es válido.<br>";
            //Comprobar si el email existe en la base de datos
            if(existe_email($email,$con))
                $error .="El email ya existe en la base de datos.<br>";
            //Si los datos son correctos doy de alta al nuevo usuario
            if(strcmp($error,"")==0){
                if(inserta_usuario($login, $password, $email, $con)){
                    $anuncio ="Usuario registrado correctamente";
                }else{
                    $error="Ha ocurrido un error en el registro";
                }
            }
            //Desconectamos la BD
            unset($con);

        }
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Desarrollo de aplicaciones web con PHP -->
<!-- Tarea 3, Foro: registro.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Foro DWES</title>
  <link href="css/registro.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id='registro'>
    <form action='registro.php' method='post'>
    <fieldset>
        <legend>Registro de nuevo usuario</legend>
        <div>
            <?php 
            if(isset($error)) {
                echo "<span class='error'>" . $error . "</span>";
            }
            if (isset($anuncio)) {
                echo "<span class='anuncio'>" . $anuncio . "</span>";
            }
            ?>
        </div>
        <div class='campo'>
            <label for='usuario' >Login:</label><br/>
            <input type='text' name='usuario' id='usuario' maxlength="50" value="<?php if (isset($_POST['usuario'])) echo $_POST['usuario']; ?>" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Contraseña:</label><br/>
            <input type='password' name='password' id='password' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Repita la Contraseña:</label><br/>
            <input type='password' name='password2' id='password2' maxlength="50" /><br/>
        </div>
         <div class='campo'>
            <label for='email' >Email:</label><br/>
            <input type='text' name='email' id='email' maxlength="50" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /><br/>
        </div>
        <div class='campo'>
            <input type='submit' name='enviar' value='Enviar' />
        </div>
        <div class='campo'>
            <input type='button' name='volver' value='Volver' onClick="location.href='index.php'"/>
        </div>  
        
    </form> 
    </fieldset>
    </div>
</body>
</html>


