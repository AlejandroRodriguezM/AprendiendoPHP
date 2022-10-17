<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php



    // Funcion que calcula el precio total de la compra
    function Calcular_Precio_Total_Compra($lista)
    {
        $precio_total = 0;
        for ($i = 0; $i < count($lista); $i += 3) {
            $precio_total += Calcular_Precio_Total_Producto($lista[$i + 1], $lista[$i + 2]);
        }
        return $precio_total;
    }

        // Funcion que calcula el precio total de un producto
        function Calcular_Precio_Total_Producto($cantidad, $precio)
        {
            return $cantidad * $precio;
        }

    function existe($array, $nombre)
    {
        //si encuentra el nombre en la array nos devuelve la posicion donde se encuentra el elemento
        $posicion = array_search($nombre, $array, false);
        return $posicion;
    }
    //funcion que nos mostrara el array en una tabla
    function mostrarTabla($array)
    {
        //si la array no esta vacia
        if (!empty($array)) {
            //creamos la tabla
            echo "<table border=1>";
            //creamos la cabecera
            echo "<tr><th>Nombre</th><th>Cantidad</th><th>Precio</th></tr>";
            //recorremos el array
            for ($i = 0; $i < count($array); $i += 3) {
                //mostramos los elementos del array
                echo "<tr><td>" . $array[$i] . "</td><td>" . $array[$i + 1] . "</td><td>" . $array[$i + 2] . "</td></tr>";
            }

            //cerramos la tabla
            echo "</table>";

            //ahora calculamos el precio total de la compra
            $total = Calcular_Precio_Total_Compra($array);
            //mostramos el precio total de la compra
            echo "<p>El precio total de la compra es: " . $total . "</p>";
        } else {
            //si la array esta vacia
            echo "La lista esta vacia";
        }
    }


    ?>

</body>

</html>