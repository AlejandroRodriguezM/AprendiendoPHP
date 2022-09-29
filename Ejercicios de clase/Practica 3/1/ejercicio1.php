<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <title>Ejercicio 1</title>
</head>

<body>
    <div class="container">
        <form role="form">
            <div class="form-group">
                <h1>Numero en ingles</h1>
                <label for="numero">Numero:</label>
                <input type="text" name="numero" class="form-control" placeholder="Ingrese un numero del 1 al 7">
                <br>
            </div>
            <button type="submit" class="btn btn-default" name="confirmar">Enviar</button>
        </form>

        <?php

        function checkEnvio()
        {
            $num = $_REQUEST['numero'];
            if (is_numeric($num)) {
                numeroPalabra($num);
            } else {
                echo "ERROR. Debes de introducir un numero";
            }
        }

        function numeroPalabra($num)
        {
            switch ($num) {
                case 1:
                    $numero = "one";
                    break;
                case 2:
                    $numero = "two";
                    break;
                case 3:
                    $numero = "three";
                    break;
                case 4:
                    $numero = "four";
                    break;
                case 5:
                    $numero = "five";
                    break;
                case 6:
                    $numero = "six";
                    break;
                case 7:
                    $numero = "seven";
                    break;
                default:
                    $numero = "ERROR. El numero no es correcto";
            }
            echo $numero;
        }

        function resultado()
        {
            if (isset($_REQUEST['confirmar']) == 'confirmar') {
                checkEnvio();
            }
        }

        resultado();
        ?>
    </div>
</body>

</html>