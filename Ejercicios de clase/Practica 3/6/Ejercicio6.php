<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <title>Ejercicio 6</title>
</head>

<body>
    <div class="container">
        <form role="form">
            <div class="form-group">
                <h1>Ejercicio 6</h1>
                <label for="primero">Ingrese el primer valor:</label>
                <input type="text" class="form-control" name="primero" placeholder="Ingrese un numero:">
                <br>
                <label for="segundo">Ingrese el primer valor:</label>
                <input type="text" class="form-control" name="segundo" placeholder="Ingrese un numero:">
                <br>
                <label for="tercero">Ingrese el primer valor:</label>
                <input type="text" class="form-control" name="tercero" placeholder="Ingrese un numero:">
                <br>
                <label for="cuarto">Ingrese el primer valor:</label>
                <input type="text" class="form-control" name="cuarto" placeholder="Ingrese un numero:">
                <br>
                <label for="quinto">Ingrese el primer valor:</label>
                <input type="text" class="form-control" name="quinto" placeholder="Ingrese un numero:">
                <br>
            </div>
            <button type="submit" name="confirmar">Enviar</button>
        </form>

        <?php

        function confirmar()
        {
            if (isset($_REQUEST['confirmar']) == 'confirmar') {
                return true;
            }
        }

        function arrayNumeros()
        {
            $num1 = $_REQUEST['primero'];
            $num2 = $_REQUEST['segundo'];
            $num3 = $_REQUEST['tercero'];
            $num4 = $_REQUEST['cuarto'];
            $num5 = $_REQUEST['quinto'];
            $numerosIntroducidos = array($num1, $num2, $num3, $num4, $num5);
            return $numerosIntroducidos;
        }

        function checkNumer($ArrayNumeros)
        {
            $resultado = "";
            for ($i = 0; $i < 5; $i++) {
                if (!is_numeric($ArrayNumeros[$i])) {
                    $resultado .= "ERROR. En la fila " . ($i + 1) . ". $ArrayNumeros[$i] no es un numero<br>";
                }
            }
            echo $resultado;
        }

        function sumaNumeros($ArrayNumeros)
        {
            $total = 0;

            for ($i = 0; $i < 5; $i++) {
                if (is_numeric($ArrayNumeros[$i])) {
                    $total += $ArrayNumeros[$i];
                } else {
                    $total = 0;
                }
            }
            return $total;
        }

        function multiNumeros($arrayNumeros)
        {
            $total = 1;
            for ($i = 0; $i < 5; $i++) {
                if (is_numeric($arrayNumeros[$i])) {
                    $total *= $arrayNumeros[$i];
                } else {
                    $total = 0;
                }
            }
            return $total;
        }

        function numMayor($arrayNumeros)
        {
            $mayor = 0;
            for ($i = 0; $i < 5; $i++) {
                if (is_numeric($arrayNumeros[$i]) and $arrayNumeros[$i] > $mayor) {
                    $mayor = $arrayNumeros[$i];
                } else {
                    return 0;
                }
            }
            return $mayor;
        }

        function numMenor($arrayNumeros)
        {
            $menor = numMayor($arrayNumeros);

            for ($i = 0; $i < 5; $i++) {
                if (is_numeric($arrayNumeros[$i]) and $arrayNumeros[$i] < $menor) {
                    $menor = $arrayNumeros[$i];
                } else {
                    return 0;
                }
            }
            return $menor;
        }

        function resultado()
        {
            if (is_bool(confirmar())) {

                $arrayNumeros = arrayNumeros();
                checkNumer($arrayNumeros);
                $table = "<table class=\"table table-striped\">
                    <tr>
                    <th>Operacion</th>
                    <th>Resultado</th>
                    </tr>";

                $table .= "<tr></tr>
                    <th>Suma</th>
                    <th>" . sumaNumeros($arrayNumeros) . "</th>
                    </tr>
                    <tr>
                    <th>Multiplicacion</th>
                    <th>" . multiNumeros($arrayNumeros) . "</th>
                    </tr>
                    <th>Mayor</th>
                    <th>" . numMayor($arrayNumeros) . "</th>
                    </tr>
                    <tr>
                    <th>Menor</th>
                    <th>" . numMenor($arrayNumeros) . "</th>
                    </tr>";

                echo $table;
            }
        }
        resultado();
        ?>


    </div>

</body>

</html>