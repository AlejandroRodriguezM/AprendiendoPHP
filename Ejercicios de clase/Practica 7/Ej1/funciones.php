<?php
        function insertar_datos($nombre,$primerApellido,$segundoApellido,$email,$anyoNacimiento,$telefono,$agenda){
            if(!empty($nombre)&&!empty($primerApellido)&&!empty($segundoApellido)&&!empty($email)&&!empty($anyoNacimiento)&&!empty($telefono)){
                array_push($agenda,$nombre);
                array_push($agenda,$primerApellido);
                array_push($agenda,$segundoApellido);
                array_push($agenda,$email);
                array_push($agenda,$anyoNacimiento);
                array_push($agenda,$telefono);
                echo "<p>Datos insertados correctamente</p>";
                return $agenda;
            }else{
                echo "<p>Todos los campos deben estar rellenados</p>";
            }
        }

        function mostrar_tabla($agenda){
                if(!empty($agenda)){
                    $fila1="<table><tr><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td>Email</td><td>Año de nacimiento</td><td>Telefono</td></tr>";
                    $filas="";
                    for($i=0;$i<count($agenda);$i+=6){
                        $filas.="<tr><td>".$agenda[$i]."</td><td>".$agenda[$i+1]."</td><td>".$agenda[$i+2]."</td><td>".$agenda[$i+3]."</td><td>".$agenda[$i+4]."</td><td>".$agenda[$i+5]."</td></tr>";
                    }
                    $filas.="</table>";
                    echo $fila1.$filas;
                }
        }
    ?>