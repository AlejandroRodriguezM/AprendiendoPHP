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

    $GLOBALS['lista'] = array();

    // if (!empty($_POST['listaProductos'])) {
    //     $lista = explode(",", $_POST['listaProductos']);
    //     $pos = count($lista);
    // } else {
    //     $lista = array();
    //     $pos = 0;
    // }



    // Funcion que muestra el menu principal
    function menuPrincipal()
    {
        echo "<h1>Lista de la compra</h1>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<ul>
        <li>
        <input class=\"menuPrincipal\" type='submit' name='enviar' value='Insertar producto'>
        </li>
        <li>
        <input class=\"menuPrincipal\" type='submit' name='enviar' value='Modificar producto'>
        </li>
        <li>
        <input class=\"menuPrincipal\" type='submit' name='enviar' value='Eliminar producto'>
        </li>
        <li>
        <input class=\"menuPrincipal\" type='submit' name='enviar' value='Mostrar lista'>
        </li>
        </ul>
        </form>";
    }

    // Funcion que muestra el formulario de insercion
    function formularioInsertar()
    {

        echo "<h1>Insertar producto</h1>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<table>
            <tr>
            <td>
            <label for='nombre'>Nombre del producto</label>
            </td>
            <td>
            <input type='text' name='nombre' id='nombre'>
            </td>
            </tr>
            <tr>
            <td>
            <label for='cantidad'>Cantidad</label>
            </td>
            <td>
            <input type='number' name='cantidad' id='cantidad'>
            </td>
            </tr>
            <tr>
            <td>
            <label for='precio'>Precio</label>
            <td>
            <input type='number' name='precio' id='precio'>
            </td>
            </td>
            </tr>
            </table>
            <br>
            <button type=\"submite\" name='insertar'>Insertar datos</button>
            <button type=\"submite\" name='salir'>Salir</button>";
        echo "</form>";
        if (isset($_REQUEST['insertar'])) {
            insertarProducto($_POST['nombre'], $_POST['precio'], $_POST['cantidad']);
        }
    }

    function insertarDatos(){
        
    }

    // Funcion que muestra la lista de la compra
    function mostrarLista()
    {
        echo "<h1>Lista de la compra</h1>";
        if (count($GLOBALS['lista']) > 0) {
            echo "<table>
            <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            </tr>";
            foreach ($GLOBALS['lista'] as $producto) {
                echo "<tr>";
                echo "<td>" . $producto['nombre'] . "</td>";
                echo "<td>" . $producto['cantidad'] . "</td>";
                echo "<td>" . $producto['precio'] . "</td>";
                echo "<td>" . $producto['total'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<p>Precio total de la compra: " . Calcular_Precio_Total_Compra($GLOBALS['lista']) . "</p>";
            echo "<h2>Total de la compra: " . Calcular_Precio_Total_Compra($GLOBALS['lista']) . "</h2>";
            echo "<button type=\"submite\" name=\"salir\">Salir</button>";
        }
    }

    // Funcion que muestra el formulario de modificacion
    function formularioModificar()
    {
        modificarProducto();
        echo "<h1>Modificar producto</h1>";
        echo "<table>
        <tr>
        <td>
        <label for='nombre'>Nombre del producto</label>
        </td>
        <td>"
            . "<select name='nombre' id='nombre'>";
        foreach ($GLOBALS['lista'] as $producto) {
            echo "<option value='" . $producto['nombre'] . "'>" . $producto['nombre'] . "</option>";
        }
        echo "</select>
        </td>
        </tr>
        <tr>
        <td>
        <label for='cantidad'>Cantidad</label>
        </td>
        <td>
        <input type='number' name='cantidad' id='cantidad'>
        </td>
        </tr>
        <tr>
        <td>
        <label for='precio'>Precio</label>
        </td>
        <td>
        <input type='number' name='precio' id='precio'>
        
        </td>
        </tr>
        </table>
        <br>
        <button type=\"submite\" name=\"modificar\">Modificar datos</button>
        <button type=\"submite\" name=\"salir\">Salir</button>";
        modificarProducto();
    }


    // Funcion que muestra el formulario de eliminacion
    function formularioEliminar()
    {
        eliminarProducto();
        echo "<h1>Eliminar producto</h1>";
        echo "
        <table>
        <tr>
        <td>
        <label for='nombre'>Nombre del producto</label>
        </td>
        <td>
        <select name='nombre' id='nombre'>";
        foreach ($GLOBALS['lista'] as $producto) {
            echo "<option value='" . $producto['nombre'] . "'>" . $producto['nombre'] . "</option>";
        }
        echo "</select>
        </td>
        </tr>
        </table>
        <br>
        <button type=\"submite\" name=\"eliminar\">Eliminar datos</button>
        <button type=\"submite\" name=\"salir\">Salir</button>";
    }

    // Funcion que calcula el precio total de un producto
    function Calcular_Precio_Total_Producto($cantidad, $precio)
    {
        return $cantidad * $precio;
    }

    // Funcion que calcula el precio total de la compra
    function Calcular_Precio_Total_Compra($lista)
    {
        $total = 0;
        foreach ($lista as $producto) {
            $total += $producto['total'];
        }
        return $total;
    }

    // Funcion que inserta los datos en la variable de sesion
    function insertarProducto($nombre, $precio, $cantidad)
    {
        $total = Calcular_Precio_Total_Producto($cantidad, $precio);
        $producto = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => $cantidad,
            'total' => $total
        );
        array_push($GLOBALS['lista'], $producto);
    }

    // Funcion que modifica un producto
    function modificarProducto()
    {
        if (isset($_REQUEST['modificar'])) {
            global $lista;
            $nombre = $_REQUEST['nombre'];
            $cantidad = $_REQUEST['cantidad'];
            $precio = $_REQUEST['precio'];
            $total = Calcular_Precio_Total_Producto($cantidad, $precio);
            $producto = array(
                'nombre' => $nombre,
                'cantidad' => $cantidad,
                'precio' => $precio,
                'total' => $total
            );
            $posicion = array_search($nombre, array_column($lista, 'nombre'));
            $lista[$posicion] = $producto;
            echo "<h1>Producto modificado correctamente</h1>";
        } elseif (isset($_REQUEST['salir'])) {
            menuPrincipal();
        }
    }

    // Funcion que elimina un producto
    function eliminarProducto()
    {
        if (isset($_REQUEST['eliminar'])) {
            global $lista;
            $nombre = $_REQUEST['nombre'];
            $posicion = array_search($nombre, array_column($lista, 'nombre'));
            unset($lista[$posicion]);
            $_SESSION['lista'] = $lista;
            echo "<h1>Producto eliminado correctamente</h1>";
            mostrarLista();
        } elseif (isset($_REQUEST['salir'])) {
            menuPrincipal();
        }
    }
    



    ?>
</body>

</html>