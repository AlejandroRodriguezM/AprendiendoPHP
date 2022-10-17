<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Document</title>
</head>

<body>
    <?php
    // Funcion que calcula el precio total de un producto
    function Calcular_Precio_Total_Producto($cantidad, $precio)
    {
        $total = $cantidad * $precio;
        return $total;
    }

    function existe($array, $nombre)
    {
        //si encuentra el nombre en la array nos devuelve la posicion donde se encuentra el elemento
        $posicion = array_search($nombre, $array, false);
        return $posicion;
    }

    

    // Funcion que muestra el formulario de insercion y inserte datos hasta pulsar el boton volver
    function formularioInsercion($array, $pos)
    {
        echo "<form action='Tarea2.php' method='post'>";
        echo "<table>";
        echo "<tr>";
        echo "<td>Nombre</td>";
        echo "<td><input type='text' name='nombre'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Cantidad</td>";
        echo "<td><input type='number' name='cantidad'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Precio</td>";
        echo "<td><input type='number' name='precio'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><input type='submit' name='insertar' value='Insertar'></td>";
        echo "<td><input type='submit' name='volver' value='Volver'></td>";
        echo "</tr>";
        echo "</table>";
        echo "<input type='hidden' name='lista' value='$array'>";
        echo "<input type='hidden' name='pos' value='$pos'>";
        echo "</form>";

        if (isset($_REQUEST['insertar'])) {
            //si el nombre no esta vacio
            if (!empty($_POST['nombre'])) {
                //almacenamos el nombre
                $nombre = $_POST['nombre'];
                //comprobamos si el nombre existe en la array
                $si = existe($array, $nombre);
                //almacenamos la cantidad
                $cantidad = $_POST['cantidad'];
                //almacenamos el precio
                $precio = $_POST['precio'];
                //si el nombre no existe

                if ($si === false) {
                    //almacenamos el nombre en la array
                    $array[$pos] = $nombre;
                    //almacenamos la cantidad en la array
                    $array[$pos + 1] = $cantidad;
                    //almacenamos el precio en la array
                    $array[$pos + 2] = $precio;
                    //aumentamos la posicion
                    $pos += 3;
                } else {
                    //si el nombre existe almacenamos y suma a la existente cantidad en la array
                    $array[$si + 1] += $cantidad;
                }
                mostrarTabla($array);
            } else {
                //si el nombre esta vacio
                echo "No se puede añadir ya que el nombre esta vacio";
            }
        }
    }

    // Funcion que muestra la lista de la compra
    function mostrarListaCompra($lista)
    {
        echo "<h1>Lista de la compra</h1>";
        echo "<table>
        <tr>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Total</th>
        </tr>";
        foreach ($lista as $producto) {
            echo "<tr>";
            echo "<td>" . $producto['nombre'] . "</td>";
            echo "<td>" . $producto['cantidad'] . "</td>";
            echo "<td>" . $producto['precio'] . "</td>";
            echo "<td>" . $producto['total'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // echo "<p>Precio total de la compra: " . Calcular_Precio_Total_Compra($lista) . "</p>";
        // echo "<h2>Total de la compra: " . Calcular_Precio_Total_Compra($lista) . "</h2>";
        echo "<input type='submit' name='enviar' value='Salir'>";
    }

    // Funcion que muestra el formulario de modificacion
    function formularioModificacion($lista)
    {
        echo "<h1>Modificar producto</h1>";
        echo "<label for='nombre'>Nombre del producto</label>";
        echo "<select name='nombre' id='nombre'>";
        foreach ($lista as $producto) {
            echo "<option value='" . $producto['nombre'] . "'>" . $producto['nombre'] . "</option>";
        }
        echo "</select>";
        echo "<label for='cantidad'>Cantidad</label>";
        echo "<input type='number' name='cantidad' id='cantidad'>";
        echo "<label for='precio'>Precio</label>";
        echo "<input type='number' name='precio' id='precio'>";
        echo "<input type='hidden' name='opcion' value='modificar'>";
        echo "<input type='submit' name='enviar' value='Enviar'>";
    }

    // Funcion que muestra el formulario de eliminacion
    function formularioEliminacion($lista)
    {
        echo "<h1>Eliminar producto</h1>";
        echo "<label for='nombre'>Nombre del producto</label>";
        echo "<select name='nombre' id='nombre'>";
        foreach ($lista as $producto) {
            echo "<option value='" . $producto['nombre'] . "'>" . $producto['nombre'] . "</option>";
        }
        echo "</select>";
        echo "<input type='hidden' name='opcion' value='eliminar'>";
        echo "<input type='submit' name='enviar' value='Enviar'>";
    }

    //funcion para insertar datos
    function insertar($lista, $nombre, $precio, $cantidad)
    {
        if (!empty($_POST['nombre'])) {
            // $total = Calcular_Precio_Total_Producto($cantidad, $precio);
            $producto = array(
                'nombre' => $nombre,
                'cantidad' => $cantidad,
                'precio' => $precio
                // 'total' => $total
            );
            array_push($lista, $producto);
        }
        // $nombre = $_POST['nombre'];
        // //comprobamos si el nombre existe en la array
        // $si = existe($lista, $nombre);
        // //almacenamos la cantidad
        // $cantidad = $_POST['cantidad'];
        // //almacenamos el precio
        // $precio = $_POST['precio'];
        // //si el nombre no existe

        // if ($si === false) {
        //     //almacenamos el nombre en la array
        //     $lista[$pos] = $nombre;
        //     //almacenamos la cantidad en la array
        //     $lista[$pos + 1] = $cantidad;
        //     //almacenamos el precio en la array
        //     $lista[$pos + 2] = $precio;
        //     //aumentamos la posicion
        //     $pos += 3;
        // } else {
        //     //si el nombre existe almacenamos y suma a la existente cantidad en la array
        //     $lista[$si + 1] += $cantidad;
        // }
        mostrarListaCompra($lista);
        return $lista;
    }

    //funcion para modificar datos
    function modificar($lista)
    {
        foreach ($lista as $producto) {
            if ($producto['nombre'] == $_REQUEST['nombre']) {
                $producto['cantidad'] = $_REQUEST['cantidad'];
                $producto['precio'] = $_REQUEST['precio'];
            }
        }
        array_push($lista, $producto);
        return $lista;
    }

    //funcion para eliminar datos
    function eliminar($lista)
    {
        foreach ($lista as $producto) {
            if ($producto['nombre'] == $_REQUEST['nombre']) {
                unset($producto);
            }
        }
        array_push($lista, $producto);
        return $lista;
    }

    // //funcion para calcular el precio total de la compra
    // function Calcular_Precio_Total_Compra($lista)
    // {
    //     $total = 0;
    //     foreach ($lista as $producto) {
    //         $total += $producto['cantidad'] * $producto['precio'];
    //     }
    //     array_push($lista, $producto);
    //     return $total;
    // }



    ?>

</body>

</html>