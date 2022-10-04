<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <title>Ejercicio 3</title>
</head>

<body>
    <div class="container">
        <form role="form">
            <div class="form-group">
                <h1>Ejercicio con formulario</h1>
                <label for="numero">Numero:</label>
                <input type="text" name="numero" class="form-control" placeholder="Ingrese un numero">
            </div>
            <br>
            <button type="submit" name="confirmar">Ingresar</button>

        </form>

        <?php

        //Funcion para comprobar que el numero introducido es un numero
        function checkNumer($num)
        {
            if (is_numeric($num)) {
                return $num;
            } else {
                return 0;
            }
        }

        //Funcion que devuelve true cuando se pulsa el boton Ingresar
        function confirmarButton()
        {
            if (isset($_REQUEST['confirmar']) == 'confirmar') {
                return true;
            }
        }

        //Devuelve en pantalla una tabla con los datos matematicos
        function resultado()
        {
            if (is_bool(confirmarButton())) {

                $table = "<table class=\"table table-striped\">
            <tr>
            <th> Numero</th>
            <th> Cuadrado</th>
            <th> Cubo</th>
            </tr>";
                $num = $_REQUEST['numero'];
                if (checkNumer($num)) {
                    for ($i = 1; $i <= $num; $i++) {

                        $table .= "<tr><td>" . $i . "</td><td>" . pow($i, 2) . "</td><td>" . pow($i, 3) . "</td></tr>";
                    }
                } else if(checkNumer($num) == 0) {
                    $table .= "<tr><td>No puedes introducir 0</td></tr>";
                }
                else{
                    $table .= "<tr><td>ERROR. Debes de introducir un numero</td></tr>";
                }
                $table .= "</table>";
                echo $table;
            }
        }

        resultado();
        ?>

    </div>

</body>

</html>