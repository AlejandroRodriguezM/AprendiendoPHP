<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <div class="container">
        <?php

        function formulario()
        {

        ?>
            <table>
                <tr>
                    <td>Introduce el numero de bolas:</td>
                    <td><input type="text" class="form-group" name="numBola" placeholder="Introduce un numero"></td>
                    <td><input type="submit" name="enviar" value="Sacar bola"> </td>
                </tr>
            </table>
        <?php
        }

        function mostrarBolas($lista)
        {
            if (!empty($lista)) {
                echo "<table><tr><td>Lista de bolas actuales</td>";
                foreach ($lista as $numero) {
                    echo "<td>$numero</td>";
                }
                echo "</tr></table><br>";
            }
        }

        function gurdarBolas()
        {
            $bolas = array();
            if (isset($_REQUEST['enviar']) and isset($_REQUEST['bolasIntroducidas'])) {
                $bolas = $_REQUEST['bolasIntroducidas'];
                $resultado = $_REQUEST['numBola'];
                if (is_numeric($resultado) and !in_array($resultado, $bolas)) {
                    $bolas[] = $resultado;
                }
            }
            return $bolas;
        }

        function resultado()
        {
            $bolas = gurdarBolas();
            mostrarBolas($bolas);
            formulario();
            foreach ($bolas as $clave => $numero) {
                echo '<input type="hidden" name="bolasIntroducidas[' . $clave . ']" value="' . $numero . '">';
            }
        }

        ?>

        <form name="formulario" action="1.php" method="post">
            <?php
            resultado();
            ?>
        </form>

    </div>

</body>

</html>