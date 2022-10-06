<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="styles/bootstrap.css"> -->
    <title>Ejercicio 2</title>
</head>

<body>
    <?php

    function formulario()
    {
    ?>
        <div class="container">
            <div class="form-group">

                <label for="nombre">Ingrese un nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingresa un nombre">
                <br>
                <label for="nombre">Ingrese un nombre</label>
                <input type="text" name="dni" class="form-control" placeholder="Ingresa un DNI">
            </div>
            <button type="submit" name="enviar">Enviar</button>
        </div>


    <?php
    }

    function checkDNI()
    {
        $dni = $_REQUEST['dni'];
        if (strlen($dni) < 8 and strlen($dni) > 8) {
            echo "<p>ERROR. El DNI introducido debe de tener 7 numeros y 1 letra</p>";
        }
    }

    function mostrarDatos($lista)
    {
        if (!empty($lista)) {
            echo "<table ><tr class=\"cabecera\"><td>Nombre</td><td>DNI</td></tr>";
            foreach ($lista as $dni => $nombre) {
                echo  "<tr><td>$nombre</td><td>$dni</td></tr>";
            }
            echo "</table>";
        }
    }

    function guardarDatos()
    {
        $datos = array();

        if (isset($_REQUEST['enviar'])) {
            if(isset($_REQUEST['nombreIntroducido'])){
                $datos = $_REQUEST['nombreIntroducido'] and $_REQUEST['dniIntroducido'];
            }

            $nombre = $_REQUEST['nombre'];
            $dni = $_REQUEST['dni'];
            if (!empty($nombre) and !empty($dni)) {
                $datos[$dni] = $nombre;
            }
        }
        return $datos;
    }

    function resultado()
    {
        $datos = guardarDatos();
        formulario();
        mostrarDatos($datos);

        foreach ($datos as $clave => $nombre) {
            echo '<input type="hidden" name="nombreIntroducido[' . $clave . ']" value="' . $nombre . '">';
        }
        foreach ($datos as $clave => $dni) {
            echo '<input type="hidden" name="dniIntroducido[' . $clave . ']" value="' . $dni . '">';
        }
    }

    ?>
    <form name="formulario" action="2.php" method="post">
        <?php

        resultado();

        ?>
    </form>


</body>

</html>