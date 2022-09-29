<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <title>Ejercicio 2</title>
</head>

<body>
    <div class="container">
        <form role="form">
            <div class="form-group">
                <h1>Dibujar asteriscos</h1>
                <label for="numero">Numero:</label>
                <input type="text" class="form-control" name="numero" placeholder="Escribe un numero">
                <br>
                <input type="radio" name="ascendente" value="asteriscos">
                <label for="asteriscoAsce">asteriscos ascendentes</label>
                <br>
                <input type="radio" name="ascendente" value="numeros">
                <label for="asteriscoAsce">numeros ascendentes</label>
            </div>
            <button type="submit" name="confirmar">Mostrar</button>
        </form>

        <?php

        //Funcion que comprueba segun la opcion escogida, lo que pintara en pantalla
        function opcionAscendente($num)
        {
            $simbolo = "";

            if (isset($_REQUEST['ascendente']) != "") {
                if ($_REQUEST['ascendente'] == "asteriscos") {
                    asteriscos($num);
                } else {
                    numAscendente($num);
                }
            }
            else{
                echo "<li>Debes de escoger una opción</li>";
            }
        }

        //Funcion que devuelve true cuando se presione el boton "Enviar"
        function confirmarEnvio(){
            if (isset($_REQUEST['confirmar']) == 'confirmar') {
                return true;
            }
        }

        //Funcion que permite comprobar que el parametro es un digito y la longitus, en caso de no ser un numero o estar vacio, devolvera un error por pantalla
        function confirmarNumero($num){
            if (is_numeric($num) and log($num) != 0 ) {
                return true;
            }
            else {
                echo "<ul><li>ERROR. Debes de poner un numero</li>";
                opcionAscendente($num)."</li></ul>";
            }
        }

        //Funcion que pinta X numeros de asteriscos segun el numero escrito
        function asteriscos($num)
        {
            $asteriscos = "";
            for ($i = 1; $i <= $num; $i++) {

                $asteriscos .= "*";
                echo  $asteriscos . "<br>";
            }
        }
        
        //Funcion que pinta X numeros segun el numero escrito
        function numAscendente($num)
        {
            $numero = "";
            for ($i = 1; $i <= $num; $i++) {
                $numero .= $i;
                echo $numero . "<br>";
            }
        }

        //Metodo que permite comprobar las demas funciones, en caso de dar el resultado imprimira diferentes mensajes
        function resultado()
        {
            if (is_bool(confirmarEnvio())) {
                $num = $_REQUEST['numero'];
                if (is_bool(confirmarNumero($num))) {
                    opcionAscendente($num);
                }
            }
        }

        //Llamada a la funcion resultado.
        resultado();
        ?>
    </div>

</body>

</html>