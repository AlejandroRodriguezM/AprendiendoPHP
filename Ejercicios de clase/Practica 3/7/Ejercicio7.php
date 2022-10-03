<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <title>Ejercicio 7</title>
</head>

<body>
    <div class="container">
        <form role="form">
            <div class="form-group">
                <h1>
                    <p>Repetir palabras.</p>
                </h1>
                <label for="frase">Frase:</label>
                <input type="text" class="form-control" name="frase" placeholder="Introduce una frase">
                <br>
                <label for="caracter">Caracter:</label>
                <input type="text" class="form-control" name="caracter" placeholder="Introduce un caracter">
                <br>
                <label for="repeticiones">Numero de repeticiones:</label>
                <input type="text" class="form-control" name="repeticiones" placeholder="Repeticiones">
                <br>
            </div>
            <button type="submit" name="confirmar">Repetir</button>

        </form>

        <?php

        function confirmar()
        {
            if (isset($_REQUEST['confirmar']) == 'confirmar') {
                return true;
            }
        }

        function checkFrase($frase)
        {
            if (strlen($frase) > 0) {
                return true;
            } else {
                echo "ERROR. No ha escrito ninguna frase<br>";
                return false;
            }
        }

        function checkCaracter($caracter)
        {

            if (strlen($caracter) > 0) {
                return true;
            } else {
                echo "ERROR. No ha escrito ninguna caracter<br>";
                return false;
            }
        }

        function checkRepeticiones($repeticiones)
        {
            if (strlen($repeticiones) > 0 and is_numeric($repeticiones)) {
                return true;
            } else {
                echo "ERROR. No ha escrito ningun numero";
                return false;
            }
        }

        function modificarFrase()
        {
            $frase = $_REQUEST['frase'];
            $caracter = $_REQUEST['caracter'];
            $repeticiones = $_REQUEST['repeticiones'];
            $incluir = "";
            $fraseFinal = "";
            if (is_bool(checkFrase($frase)) and is_bool(checkCaracter($caracter)) and is_bool(checkRepeticiones($repeticiones))) {

                for ($i = 0; $i < $repeticiones; $i++) {
                    $incluir .= $caracter;
                }

                for ($i = 0; $i < strlen($frase); $i++) {
                    if ($frase[$i] != $caracter) {
                        $fraseFinal .= $frase[$i];
                    } else {
                        $fraseFinal .= $frase[$i].$incluir;
                    }
                }
                echo $fraseFinal;
            }
        }

        function resultado()
        {
            if (is_bool(confirmar())) {
                modificarFrase();
            }
        }
        resultado();
        ?>

    </div>

</body>

</html>