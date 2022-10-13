<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <div>
        <form action="3.php" method="post">

            <?php
            function formulario()
            {
                if (!$_REQUEST) {
                    echo "
                    <h1>Recibir varios nombres de frutas</h1>
                    
                    <table>
                    <tr>
                    <td><label for=\"numFrutas\">¿Cuantas frutas deseas indicar?</label></td>
                    <td><input type=\"text\" name=\"numFrutas\" placeholder=\"Introduce un numero\"</td>
                    <td> <button type=\"submit\" name=\"enviar\">Enviar</button></td>
                    </tr>
                    </table>";
                } elseif (isset($_REQUEST['numFrutas'])) {
                    $numero = $_REQUEST['numFrutas'];
                    formularioFrutas($numero);
                }
                else{
                    listaFrutas();
                }
            }

            function formularioFrutas($numero){
                echo "<h1>Introduce el nombre de frutas</h1>";
                for ($i = 0; $i < $numero; $i++) {
                    echo "<table>
                    <tr>
                    <td>Fruta $i: <input type=\"text\" name=\"frutas[]\" placeholder=\"Nombre de una fruta\"></td>
                    </tr>
                    </table>";
                }
                echo "<button type=\"submite\" name=\"enviarNombres\">Enviar</button>";
            }

            function listaFrutas(){
                echo "<h1>Tu lista de frutas son:</h1>";
                if (isset($_REQUEST['enviarNombres'])) {
                    foreach ($_REQUEST["frutas"] as $fruta) {
                        echo "<p>Fruta recibida: $fruta</p>";
                    }
                }
            }
            
            formulario();
            ?>
        </form>
    </div>

</body>

</html>