<?php
function test_input($data)
{
    $data = trim($data); //elimina los espacios
    $data = stripslashes($data); //elimina las barras, para que los hackers no puedan entrar facilmente
    $data = htmlspecialchars($data); //para evitar que metan etiquetas
    return $data;
}

function conectar($base)
{
    $conexion = mysqli_connect("localhost", "root", "1234", $base) or die("Problemas con la conexión");
    //or die: si hay un error sale ese cartel
    return $conexion;
}

function listarAlumnos($base, $query)
{
    $conexion = conectar($base);
    $registros = $conexion->query($query) or die($conexion -> error);

    while ($reg = $registros->fetch_array()) { //el fetch apunta a la primera fila y luego pasa a la siguiente.Mientras que haya registro me va a mostrar los registros
        echo "<tr>";
        echo "<td>" . $reg['Codigo'] . "</td>";
        echo "<td>" . $reg['Nombre'] . "</td>";
        echo "<td>" . $reg['Email'] . "</td>";

        switch ($reg['CodigoCurso']) {
            case 1:
                echo "<td>PHP</td>";
                break;
            case 2:
                echo "<td>ASP</td>";
                break;
            case 3:
                echo "<td>JSP</td>";
                break;
        }
        echo "</tr>";
    }
    mysqli_close($conexion);
}

function insertar($query, $base)
{
    $conexion = conectar($base);
    $conexion->query($query) or die($conexion -> error);
    $conexion->close();
}

function borrar($query, $mail, $base)
{
    $conexion = conectar($base);
    $registros = $conexion->query("select Codigo, Nombre from alumnos where Email='$mail'") or die("Problema en el select " . mysqli_error($conexion)); //buscar el codigo del email del alumno que quiero borrar, es para comprobar que el email está en la lista
    if ($reg =  $registros->fetch_array()) {
        $conexion->query($query) or die($conexion -> error);
        echo "Se ha efectuado el borrado del alumno " . $reg['Nombre'];
    } else {
        echo "No existe el alumno";
    }
    mysqli_close($conexion);
}

function modificar($query, $base,$mail)
{
    $conexion = conectar($base);
    $registros = $conexion->query("select Codigo, Nombre from alumnos where Email='$mail'") or die("Problema en el select " . mysqli_error($conexion)); //buscar el codigo del email del alumno que quiero borrar, es para comprobar que el email está en la lista
    if ($reg =  $registros->fetch_array()) {
        $conexion->query($query) or die($conexion -> error);
        echo "Se ha efectuado el modificado del alumno " . $reg['Nombre'];
    } else {
        echo "No existe el alumno";
    }
    mysqli_close($conexion);
}
