<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <title>Ejercicio 4</title>
</head>

<body>
    <div class="container">
        <form role="form">
            <div class="form-group">
                <h1>
                    <p>Ejercicio con Formulario.</p>
                </h1>
                <label for="numero">Ingrese un numero:</label>
                <input type="text" name="numero" class="form-control" placeholder="Escribe un numero">
            </div>
            <button type="submit" name="Ingresar">Ingresar</button>
        </form>

        <?php

        function checkNumber($num)
        {
            if (is_numeric($num)) {
                return $num;
            } else {
                echo "ERROR. '$num' no es un numero. Ingresa un numero.";
            }
        }

        function checkConfirmar()
        {
            if (isset($_REQUEST['Ingresar']) == 'Ingresar') {
                return true;
            }
        }

        function numPares($num)
        {
            $numeroPar = "";
            for ($i = 2; $i < $num; $i++) {
                if (($i % 2) == 0) {
                    $numeroPar .= $i . "-";
                }
            }
            echo $numeroPar;
        }

        function mostrarPares()
        {
            if (is_bool(checkConfirmar())) {
                $num = $_REQUEST['numero'];
                if (checkNumber($num)) {
                    numPares($num);
                }
            }
        }

        mostrarPares();
        ?>
    </div>
</body>

</html>