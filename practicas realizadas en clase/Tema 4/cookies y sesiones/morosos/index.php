<?php
    include 'funciones.inc.php';
    //Comprobamos si ya se enviado el formulario
    if(isset($_POST['enviar'])){
        $login=$_POST['usuario'];
        $password=$_POST['password'];

        //Comprobar si hay alguno vacio
        if(empty($login)||empty($password))
            $error="Debes introducir un nombre de usuario y una contraseña";
        else{
            //Conexion a la BD
            $con=conexion_bd("morosos");

            //Obtenemos el password almacenado en la BD
            $password_bd=obtener_password($login, $con);

            //Comprobamo las credenciales con la BD
            //password_verify encripta el primer parametro y compara
            if (password_verify($password,$password_bd)){
                //Si el usuario no está bloqueado inicio la sesión
                if(!usuario_bloqueado($login, $con)){
                    session_start();
                    $_SESSION['user']
=$login;
                    $_SESSION['hora']=date("H:i",time());
                    //usar getDate o Date
                    header("Location:usuario.php");
                }else{
                    $error="El usuario está bloqueado. Solo un administrador lo desbloquea";
                }
            }else{
                //utilizamos una cookie para controlar el usuario y fallos
                if(!isset($_COOKIE['login'])){
                    $num_fallos=1;
                    setcookie('login',$login,time()+3600);
                    setcookie('num_fallos',$num_fallos,time()+3600);
                    $error="Contraseña incorrecta primer intento, al tercero se bloquea";
                }else if($_COOKIE['num_fallos']==1 && $_COOKIE['login']==$login){
                    $num_fallos=2;
                    setcookie('login',$login,time()+3600);
                    setcookie('num_fallos',$num_fallos,time()+3600);
                    $error="Contraseña incorrecta segundo intento, al tercero se bloquea";
                }else if($_COOKIE['num_fallos']==1 && $_COOKIE['login']!=$login){
                    $num_fallos=1;
                    setcookie('login',$login,time()+3600);
                    setcookie('num_fallos',$num_fallos,time()+3600);
                    $error="Contraseña incorrecta primer intento, al tercero se bloquea";
                }else if($_COOKIE['num_fallos']==2 && $_COOKIE['login']==$login){
                    setcookie('login',null,-1);
                    setcookie('num_fallos',null,-1);
                    if(bloquea_usuario($login, $con)){
                        $error="Tras el tercer intento se bloquea";
                    }else{
                        $error="Error al bloquear al usuario";
                    }
                }else if($_COOKIE['num_fallos']==2 && $_COOKIE['login']!=$login){
                    $num_fallos=1;
                    setcookie('login',$login,time()+3600);
                    setcookie('num_fallos',$num_fallos,time()+3600);
                    $error="Contraseña incorrecta primer intento, al tercero se bloquea";
                }
            }
        }
        unset($con);

    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Desarrollo de aplicaciones web con PHP -->
<!-- Tarea 3, Foro: index.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Empresa Okupa</title>
  <link href="css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id='login'>
    <form action='index.php' method='post'>
    <fieldset>
        <legend>Login</legend>
        <div><span class='error'><?php if (isset($error)) echo $error; ?></span></div>
        <div class='campo'>
            <label for='usuario' >Usuario:</label><br/>
            <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Contraseña:</label><br/>
            <input type='password' name='password' id='password' maxlength="50" /><br/>
        </div>

        <div class='campo'>
            <input type='submit' name='enviar' value='Enviar' />
        </div>
        <div class='enlace'>
            <a href='registro.php'>Registrarse</a>
        </div>    
        <div class='enlace'>
            <a href='invitado.php'>Entrar como invitado</a>
        </div>

    </fieldset>
    </form>
    </div>
</body>
</html>
