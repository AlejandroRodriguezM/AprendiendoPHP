<?php

//Busca un nombre en el array y devuelve la posición o false si no lo encuentra
function existe($miarray,$miNombre){
        $posicion=array_search($miNombre,$miarray,false);
        return $posicion;
       }
//Agrega un telefono a partir de la posición pos
function agregar($array,$nom,$cantidad,$precio,$pos){
    $array[$pos]=$nom;
    $array[$pos+1]=$cantidad;
	$array[$pos+2]=$precio;
    echo "<div class='altoDch1'>DATO AÑADIDO</div>";
	return $array;
}
//Si no están vacios el nombre y el telefono y no está en el array se puede insertar	
function validarInsertar($array,$nom){
	if(!empty($nom)){
        $si=existe($array,$nom);
        if (!($si || $si===0)){
            return true;  //podemos agregar el dato
          }else{
			 echo "<div class='altoDch1'><p>DATO YA EXISTE</p></div>"; 
			 return false;
		  }
        }else{
		   //Si está vacio el nombre
				echo "<div class='altoDch2'><p>FALTA EL NOMBRE</p></div>";
				return false;
			}
	   }

//Si el nombre está lo borra
function borrar($array,$nom){
	if(!empty($nom)){
        $si=existe($array,$nom);
        if ($si || $si===0){
            unset($array[$si]);
			unset($array[$si+1]);
			unset($array[$si+2]);
			$array=array_values($array);
			echo "<div class='altoDch1'><p>DATO ELIMINADO</p></div>";
		  }else{
			 echo "<div class='altoDch1'><p>EL REGISTRO NO EXISTE</p></div>"; 
		  }
        }else{
		   //Si está vacio el nombre
				echo "<div class='altoDch2'><p>FALTA EL NOMBRE</p></div>";
			}
		return $array;
}

//Modificar el registro
function modificar($array,$nom,$cantidad,$precio){
	if(!empty($nom)){
        $si=existe($array,$nom);
        if (!($si || $si===0)){
            echo "<div class='altoDch1'><p>EL REGISTRO NO EXISTE</p></div>";   //el dato está agregado
          }else{
			 echo "<div class='altoDch1'><p>DATO MODIFICADO</p></div>"; 
			 $array[$si+1]=$cantidad;
			 $array[$si+2]=$precio;
		  }
        }else{
             //Si está vacio el nombre
			echo "<div class='altoDch2'><p>FALTA EL NOMBRE</p></div>";
			}
			return $array;
}
//Dibujamos una tabla con los datos
function mostrarTabla($array){
	if (count($array)>1){
			echo "<h1>List&iacute;n Productos:</h1>";
			echo "<table><tr align='center'><th>Nombre</th><th>Cantidad</th><th>Precio</th></tr>";
			for ($i=0 ; $i < count($array) ; $i+=3){
				if($array[$i]!==NULL && $array[$i+1]!==NULL && $array[$i+2]!==NULL)
					echo "<tr><td>".$array[$i]."</td><td>".$array[$i+1]."</td><td>".$array[$i+2]."</td></tr>"; 
			}
			echo "</table>";
		}
}	



function Calcular_Precio_Total_Producto($array,&$lista){
        $j=0;
        for($i=0;$i<count($array);$i+=3){
            if(is_numeric($array[$i+1]) && is_numeric($array[$i+2])){
                $lista[$j]=$array[$i+1]*$array[$i+2];
                $j++;
            }
        }
}

function Calcular_Precio_Total_Compra($lista){
            $suma=0;
            foreach($lista as $valor){
                $suma +=$valor;
            }
            return $suma;
        }
		
//Dibujamos otra tabla con los datos
function mostrarTabla2($array){
	$lista=array();
    Calcular_Precio_Total_Producto($array,$lista);
    $tabla="<table><tr><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Total</th></th>";
    $j=0;
    for($i=0;$i<count($array);$i+=3){
	if(is_numeric($array[$i+1]) && is_numeric($array[$i+2])){
         $tabla .="<tr><td>".$array[$i]."</td><td>".$array[$i+1]."</td><td>".$array[$i+2]."</td><td>".$lista[$j]."</td><tr>";
         $j++;
	  }
    }
    $tabla .="<tr><td colspan='3'>TOTAL</td><td>".Calcular_Precio_Total_Compra($lista)."</td></tr></table>";
      echo $tabla;
}	
?>