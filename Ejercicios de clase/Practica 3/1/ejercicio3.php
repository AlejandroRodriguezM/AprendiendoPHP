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
                <h1>Numero en ingles.</h1>
                <label for="numero"></label>
                <input type="text" name="num" class="form-control" id="numero" placeholder="Ingrese un numero del 1 al 17">
                <br>
            </div>
            <button type="submit" class="btn btn-default" name="confirmar">Mostrar</button>
        </form>

        <?php

        function comprobarNumero()
        {
            $num = $_REQUEST['num'];
            if (is_numeric($_REQUEST['num']) >= 1 and is_numeric($_REQUEST['num']) <= 17) {
                echo numero($num);
            } else {
                echo 'ERROR. Escribe un numero.';
            }
        }
        function numero($num)
        {
            switch ($num) {
                case 1:
                    $numero = "uno";
                    break;
                case 2:
                    $numero = "dos";
                    break;
                case 3:
                    $numero = "tres";
                    break;
                case 4:
                    $numero = "cuatro";
                    break;
                case 5:
                    $numero = "cinco";
                    break;
                case 6:
                    $numero = "seis";
                    break;
                case 7:
                    $numero = "siete";
                    break;
                case 8:
                    $numero = "ocho";
                    break;
                case 9:
                    $numero = "nueve";
                    break;
                case 10:
                    $numero = "diez";
                    break;
                case 11:
                    $numero = "once";
                    break;
                case 12:
                    $numero = "doce";
                    break;
                case 13:
                    $numero = "trece";
                    break;
                case 14:
                    $numero = "catorce";
                    break;
                case 15:
                    $numero = "quince";
                    break;
                case 16:
                    $numero = "dieciseis";
                    break;
                case 17:
                    $numero = "ddiecisiete";
                    break;
            }
            return $numero;
        }
        function devolverNombre()
        {
            if (isset($_REQUEST['confirmar']) == 'confirmar') {
                comprobarNumero();
            }
        }
        devolverNombre();
        ?>
    </div>
</body>

</html>