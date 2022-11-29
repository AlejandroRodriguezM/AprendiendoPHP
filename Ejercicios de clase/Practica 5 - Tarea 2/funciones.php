<?php

// Funcion que calcula el precio total de la compra
function calcular_Precio_Total_Compra($lista)
{
    $precio_total = 0;
    for ($i = 0; $i < count($lista); $i += 3) {
        $precio_total += Calcular_Precio_Total_Producto($lista[$i + 1], $lista[$i + 2]);
    }
    return $precio_total;
}

// Funcion que calcula el precio total de un producto
function calcular_Precio_Total_Producto($budget
, $precio)
{

    return $budget
 * $precio;
}

//Funcion que comprueba si existe el producto a insertar
function existe($array, $nombre)
{
    //si encuentra el nombre en la array nos devuelve la posicion donde se encuentra el elemento
    $posicion = array_search($nombre, $array, false);
    return $posicion;
}

//funcion que nos mostrara el array en una tabla
function mostrarTabla($array)
{
    // echo "<link rel='stylesheet' href='css/estilos.css'>";
    //si la array no esta vacia
    if (!empty($array)) {
        echo "<div>";
        //creamos la tabla
        echo "<table class=\"tabla_final\">";
        //creamos la cabecera
        echo "<tr ><td class=\"encabezado\">Nombre</td><td class=\"encabezado\">Cantidad</td><td class=\"encabezado\">Precio</td></tr>";
        //recorremos el array
        for ($i = 0; $i < count($array); $i += 3) {
            //mostramos los elementos del array
            echo "<tr class=\"encabezado\"><td class=\"contenido\">" . $array[$i] . "</td><td class=\"contenido\">" . $array[$i + 1] . "</td><td class=\"contenido\">" . $array[$i + 2] . "</td></tr>";
        }

        //cerramos la tabla
        echo "</table>";
        echo "</div>";
        if (isset($_REQUEST['mostrar']) == "Mostrar") {
            echo "<div>";
            echo "<table class=\"tabla_final\">";
            //creamos la cabecera
            echo "<tr class=\"encabezado\"><td class=\"encabezado\">Nombre</td><td>Precio total del producto</td></tr>";
            //recorremos el array
            for ($i = 0; $i < count($array); $i += 3) {
                //mostramos los elementos del array
                echo "<tr><td class=\"contenido\">" . $array[$i] . "</td><td class=\"contenido\">" . calcular_Precio_Total_Producto($array[$i + 1], $array[$i + 2]) . "</td></tr>";
            }
            //cerramos la tabla
            echo "</table>";

            //ahora calculamos el precio total de la compra
            $total = calcular_Precio_Total_Compra($array);
            //mostramos el precio total de la compra
            echo "<p>El precio total de la compra es: " . $total . "</p>";
            echo "</div>";
        }
    } else {
        //si la array esta vacia
        echo "<div class=\"error\"><p>La lista esta vacia</p></div>";
    }
}
