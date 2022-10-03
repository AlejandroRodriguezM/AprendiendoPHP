<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <title>Ejercicio 5</title>
</head>

<body>
    <div class="container">
        <form role="form">
            <div class="form-group">
                <h1>
                    <p>Ejercicio con Formulario</p>
                </h1>
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre">
                <br>
                <label for="apellido">Nombre:</label>
                <input type="text" class="form-control" name="apellido" placeholder="Ingrese el apellido">
                <br>
                <label for="ciudad">Nombre:</label>
                <input type="text" class="form-control" name="ciudad" placeholder="Ingrese la ciudad">
            </div>
            <br>
            <button type="submit" name="confirmar">Ingresar</button>
            <br>
        </form>

        <?php

        function checkText()
        {
            $textoCompleto = "";
            $name = $_REQUEST['nombre'];
            $lastName = $_REQUEST['apellido'];
            $city = $_REQUEST['ciudad'];

            if (strlen($name) != 0 and strlen($lastName) != 0 and strlen($city) != 0) {
                echo "$name $lastName vive en $city";
            }
        }

        function checkConfirmar()
        {
            if (isset($_REQUEST['confirmar']) == 'confirmar') {
                return true;
            }
        }

        function verFrase()
        {
            if (is_bool(checkConfirmar())) {
                checkText();
            }
        }
        verFrase();

        ?>

    </div>

</body>

</html>