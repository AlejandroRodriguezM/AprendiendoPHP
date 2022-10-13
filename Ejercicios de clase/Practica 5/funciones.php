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

    // Funcion que calcula el precio total de la compra
    function Calcular_Precio_Total_Compra($lista)
    {
        $total = 0;
        foreach ($lista as $producto) {
            $total += $producto['total'];
        }
        return $total;
    }

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
    function formularioInsercion()
    {
        echo "<h1>Insertar producto</h1>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<label for='nombre'>Nombre del producto</label>";
        echo "<input type='text' name='nombre' id='nombre'>";
        echo "<label for='cantidad'>Cantidad</label>";
        echo "<input type='number' name='cantidad' id='cantidad'>";
        echo "<label for='precio'>Precio</label>";
        echo "<input type='number' name='precio' id='precio'>";
        echo "<input type='hidden' name='opcion' value='insertar'>";
        echo "<input type='submit' name='enviarInsertado' value='Enviar'>";
        if (isset($_REQUEST['enviarInsertado'])) {
            $lista[] = array(
                'nombre' => $_REQUEST['nombre'],
                'cantidad' => $_REQUEST['cantidad'],
                'precio' => $_REQUEST['precio']
            );
        }
        echo "</form>";
    }

    // Funcion que muestra la lista de la compra
    function mostrarListaCompra($lista)
    {
        echo "<h1>Lista de la compra</h1>";
        echo "<form action='Tarea2.php' method='post'>";
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
        echo "<p>Precio total de la compra: " . Calcular_Precio_Total_Compra($lista) . "</p>";
        echo "<h2>Total de la compra: " . Calcular_Precio_Total_Compra($lista) . "</h2>";
        echo "<input type='submit' name='enviar' value='Enviar'>";
        echo "</form>";
    }

    // Funcion que muestra el formulario de modificacion
    function formularioModificacion($lista)
    {
        echo "<h1>Modificar producto</h1>";
        echo "<form action='Tarea2.php' method='post'>";
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
        echo "</form>";
    }

    // Funcion que muestra el formulario de eliminacion
    function formularioEliminacion($lista)
    {
        echo "<h1>Eliminar producto</h1>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<label for='nombre'>Nombre del producto</label>";
        echo "<select name='nombre' id='nombre'>";
        foreach ($lista as $producto) {
            echo "<option value='" . $producto['nombre'] . "'>" . $producto['nombre'] . "</option>";
        }
        echo "</select>";
        echo "<input type='hidden' name='opcion' value='eliminar'>";
        echo "<input type='submit' name='enviar' value='Enviar'>";
        echo "</form>";
    }

    ?>

</body>

</html>