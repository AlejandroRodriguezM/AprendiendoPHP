<?php
/*
 * Función para conectarnos a la BD
 * Para que no tengamos problemas con los acentos, en la cadena de conexión indicamos en el array de opciones la codificación
 * Devolvemos el identificador de la conexión
 */
function conexion_bd($base){
    try{
        $opc=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
        $dsn="mysql:host=localhost;dbname=$base";
        $con=new PDO($dsn,"root","",$opc);
        return $con;
    }catch(PDOException $e){
        $error=$e->getCode();
        $anuncio=$e->getMessage();
        die("Error".$anuncio." ".$error);
    }
    
}//fin de conexion_bd

/*
 * Dado un login de usuario obtenemos su password
 * 
 */
function obtener_password($login, $con){
    try{
        $sql="Select password from anunciantes where login='$login'";
        if($resultado=$con->query($sql)){
            $fila=$resultado->fetch();
            if($fila!=null){
                unset($resultado);
                return $fila['password'];
            }
        }
    }catch(PDOException $e){
        $error=$e->getCode();
        $anuncio=$e->getMessage();
        die("Error".$anuncio." ".$error);
    }
    
}//fin de obtener_password

/*
 * Comprobamos si existe el login en la BD
 * Devolvemos true si existe, false en caso contrario
 */
function existe_login($login, $con){
    try{
        $sql="Select login from anunciantes where login='$login'";
        if($resultado=$con->query($sql)){
            $fila=$resultado->fetch();
            unset($resultado);
            if($fila!=null){   
                return true;
            }else{
                return false;
            }
        }
    }catch(PDOException $e){
        $error=$e->getCode();
        $anuncio=$e->getMessage();
        die("Error".$anuncio." ".$error);
    }
    
    
}//fin existe_login

/*
 * Comprobamos si el usuario pasado como parámetro está bloqueado
 * Devolvemos el contenido del campo bloqueado en la BD que puede ser 1 (true) ó 0 (false)
 */
function usuario_bloqueado($login, $con){
    try{
        $sql="Select bloqueado from anunciantes where login='$login'";
        if($resultado=$con->query($sql)){
            $fila=$resultado->fetch();
            unset($resultado);
            return $fila['bloqueado'];
        }
    }catch(PDOException $e){
        $error=$e->getCode();
        $anuncio=$e->getMessage();
        die("Error".$anuncio." ".$error);
    } 
    
    
}//fin usuario_bloqueado

/*
 * Comprobamos si existe el email en la BD
 * Devolvemos true si existe, false en caso contrario
 */
function existe_email($email, $con){
    try{
        $sql="Select email from anunciantes where email='$email'";
        if($resultado=$con->query($sql)){
            $fila=$resultado->fetch();
            unset($resultado);
            if($fila!=null){   
                return true;
            }else{
                return false;
            }
        }
    }catch(PDOException $e){
        $error=$e->getCode();
        $anuncio=$e->getMessage();
        die("Error".$anuncio." ".$error);
    }
    
    
}//fin existe_email

/*
 * Función para comprobar si la contraseña tiene 6 o más caracteres
 * Devuelve true si el tamaño es igual o mayor a 6, false si el tamaño es menor a 6
 */
function comprueba_tamanio_contrasenia($contrasenia){
    if(strlen($contrasenia) < 6)
        return false;
    else
        return true;
}//fin de comprueba_tamanio_contrasenia


/*
 * Función para comprobar  si la contraseña tiene al menos una letra minúscula
 * Devuelve true si tiene al menos una minúscula y false en caso contrario
 */
function comprueba_minus_contrasenia($contrasenia){
    if (!preg_match('`[a-z]`',$contrasenia))
        return false;
    else
        return true;
}//fin de comprueba_minus_contrasenia

/*
 * Función para comprobar  si la contraseña tiene al menos una letra mayúscula
 * Devuelve true si tiene al menos una mayúscula y false en caso contrario
 */
function comprueba_mayus_contrasenia($contrasenia){
    if (!preg_match('`[A-Z]`',$contrasenia))
        return false;
    else
        return true;
}//fin de comprueba_mayus_contrasenia

/*
 * Función para comprobar  si la contraseña tiene al menos un caracter numérico
 * Devuelve true si tiene al menos un número y false en caso contrario
 */
function comprueba_num_contrasenia($contrasenia){
    if (!preg_match('`[0-9]`',$contrasenia))
        return false;
    else
        return true;
}//fin de comprueba_mayus_contrasenia   
    

/*
 * Función para comprobar si un email es válido
 * Recibimos una variable por referencia donde guardamos el error cometido por el usuario
 * Devolvemos un valor booleano true si es válido y false en caso contrario
 */
function validar_email($email) {
    if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email)) {
        return true;
    } else {
        return false;
    }
}//fin de validar_email

/*
 * Insertar los datos de un usuario en la BD
 * Devuelve true si la inserción se realizó y false en caso contrario
 */
function inserta_usuario($login, $password, $email, $con){
    try{
        $password_hast=crypt($password,'XC');
        $sql="Insert into anunciantes values ('$login','$password_hast',1,'$email')";
        if($con->exec($sql)){
            return true;
        }
    }catch(PDOException $e){
        $error=$e->getCode();
        $anuncio=$e->getMessage();
        die("Error".$anuncio." ".$error);
        return false;
    }
    
}//fin de obtener_password

/*
 * Insertamos un anuncio en la BD
 * Devuelve true si la inserción se realizó y false en caso contrario
 */
function inserta_anuncio($autor, $moroso,$localidad,$contenido, $fecha, $con){
     try{
        $sql="Insert into anuncios values('$autor','$moroso','$localidad','$contenido','$fecha')";
        if($con->exec($sql)){
            return true;
        }
     }catch(PDOException $e){
        $error=$e->getCode();
        $anuncio=$e->getMessage();
        die("Error".$anuncio." ".$error);
        return false;
    }
}//fin de inserta_anuncio

/*
 * Modificamos el campo bloqueado a true
 * Devuelve true si la modificación se realizó correctamente, false en caso contrario
 */
function bloquea_usuario($login, $con){
    try{
     $sql="update anunciantes set bloqueado=1 where login='$login'";
     if($con->exec($sql)){
        return true;
     }else{
        return false;
     }
    }catch(PDOException $e){
        $error=$e->getCode();
        $anuncio=$e->getMessage();
        die("Error:$anuncio Codigo:$error");
    }
}//fin de inserta_anuncio

/*
 * Función para consultar todos los anuncios del foro.
 * Imprimimos por pantalla los anuncios
 */
function consulta_full_anuncios($con){
    try {
        
        $sql = "SELECT autor, moroso,localidad,descripcion, fecha FROM anuncios";
        
        $resultado = $con->query($sql);
        
        if($resultado) {
            // Mostramos los datos
      
            $row = $resultado->fetch();
            while ($row != null) {
                //Tengo que diferenciar si el anuncio es anterior a no a una semana.
               
               
                if ($row['fecha']>=date('Y-m-d', time()-604800)){
                    //El anuncio es Nuevo
                    echo "<div class='post_privado'>";
                }else {
                    //El anuncio es antiguo
                    echo "<div class='anuncio_publico'>";
                }
                echo "<div class='autoryfecha'><span style='color:#528FD5'>".$row['autor']."</span>&nbsp;&nbsp;&nbsp;publicó el&nbsp;&nbsp;&nbsp;<span style='color:#528FD5'>"
                        .formatea_fecha($row['fecha'])."</span></div>";
                echo "<br />";
                echo "<div class='contenido'>".$row['descripcion']."</div>";
				echo "<br>Moroso:".$row['moroso']."&nbsp;&nbsp;Localidad:".$row['localidad'];
                echo "</div>";
                $row = $resultado->fetch();
            }
	}
        
    } catch (PDOException $e) {
        $error = $e->getCode();
        $anuncio = $e->getMessage();
        die("Error: " . $anuncio . " " . $error);
     }
}//fin consulta_full_anuncios

// Obtener los elementos bloqueados
function getBloqueados($con)
{
	try{
        $consulta="select * from anunciantes where bloqueado=1";
        $resultado = $con->query($consulta);
        if($resultado) {
            // Mostramos los datos
            $lista=array();
            $row = $resultado->fetch();
            while ($row != null) {
                $lista[]=$row;
                $row = $resultado->fetch();
            }
            return $lista;
        }

    }catch(PDOException $e) {
        $error = $e->getCode();
        $anuncio = $e->getMessage();
        die("Error: " . $anuncio . " " . $error);
     }
}

/*
*  Desbloquear usuarios
*/
function desbloquearUsuarios($login,$conexion)
{
	try{
        $consulta="Update anunciantes set bloqueado=0 where login='$login'";
        if($conexion->exec($consulta)){
            return true;
        }
    }catch (PDOException $e) {
        $error = $e->getCode();
        $anuncio = $e->getMessage();
        die("Error: " . $anuncio . " " . $error);
        return false;
     }	
		
	
}



/*
 * Función con la que damos formato a una fecha
 * El formato de salida será dd/mm/aaaa
 * Devolvemos un string con el formato indicado
 */
function formatea_fecha($fecha1){

    $fecha2=date("d-m-Y",strtotime($fecha1));

    return $fecha2;

}//fin de formatea_fecha