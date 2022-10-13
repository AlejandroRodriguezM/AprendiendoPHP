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
        echo "<div class='altoDch1'>MENU PRINCIPAL</div>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<input type='submit' name='enviar' value='Insertar producto'>";
        echo "<input type='submit' name='enviar' value='Modificar producto'>";
        echo "<input type='submit' name='enviar' value='Eliminar producto'>";
        echo "<input type='submit' name='enviar' value='Mostrar lista'>";
        echo "</form>";
    }

    // Funcion que muestra el formulario de insercion
    function formularioInsertar()
    {
        echo "<div class='altoDch1'>INSERTAR PRODUCTO</div>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<label>Nombre del producto: </label><input type='text' name='nombre' required><br>";
        echo "<label>Cantidad: </label><input type='number' name='cantidad' required><br>";
        echo "<label>Precio: </label><input type='number' name='precio' required><br>";
        echo "<input type='submit' name='enviarInsertado' value='Insertar'>";
        echo "<input type='submit' name='volver' value='Volver'>";
        echo "</form>";
    }

    // Funcion que muestra el formulario de modificacion
    function formularioModificar($lista)
    {
        echo "<div class='altoDch1'>MODIFICAR PRODUCTO</div>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<label>Nombre del producto: </label><input type='text' name='nombre' required><br>";
        echo "<label>Cantidad: </label><input type='number' name='cantidad' required><br>";
        echo "<label>Precio: </label><input type='number' name='precio' required><br>";
        echo "<input type='submit' name='enviarModificado' value='Modificar'>";
        echo "<input type='submit' name='volver' value='Volver'>";
        echo "</form>";
    }

    // Funcion que muestra el formulario de eliminacion
    function formularioEliminar($lista)
    {
        echo "<div class='altoDch1'>ELIMINAR PRODUCTO</div>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<label>Nombre del producto: </label><input type='text' name='nombre' required><br>";
        echo "<input type='submit' name='enviarEliminado' value='Eliminar'>";
        echo "<input type='submit' name='volver' value='Volver'>";
        echo "</form>";
    }
    
    // Funcion que muestra la lista de productos
    function mostrarLista($lista)
    {
        echo "<div class='altoDch1'>LISTA DE PRODUCTOS</div>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Cantidad</th>";
        echo "<th>Precio</th>";
        echo "<th>Total</th>";
        echo "</tr>";
        foreach ($lista as $producto) {
            echo "<tr>";
            echo "<td>" . $producto['nombre'] . "</td>";
            echo "<td>" . $producto['cantidad'] . "</td>";
            echo "<td>" . $producto['precio'] . "</td>";
            echo "<td>" . $producto['total'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<input type='submit' name='volver' value='Volver'>";
        echo "</form>";
    }

    // Funcion que muestra el mensaje de error
    function mostrarError($mensaje)
    {
        echo "<div class='altoDch1'>ERROR</div>";
        echo "<p>$mensaje</p>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<input type='submit' name='volver' value='Volver'>";
        echo "</form>";
    }

    // Funcion que muestra el mensaje de exito
    function mostrarExito($mensaje)
    {
        echo "<div class='altoDch1'>EXITO</div>";
        echo "<p>$mensaje</p>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<input type='submit' name='volver' value='Volver'>";
        echo "</form>";
    }

    // Funcion que muestra el mensaje de confirmacion
    function mostrarConfirmacion($mensaje)
    {
        echo "<div class='altoDch1'>CONFIRMACION</div>";
        echo "<p>$mensaje</p>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<input type='submit' name='confirmar' value='Confirmar'>";
        echo "<input type='submit' name='cancelar' value='Cancelar'>";
        echo "</form>";
    }

    // Funcion que muestra el mensaje de confirmacion de eliminacion
    function mostrarConfirmacionEliminacion($mensaje)
    {
        echo "<div class='altoDch1'>CONFIRMACION</div>";
        echo "<p>$mensaje</p>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<input type='submit' name='confirmarEliminacion' value='Confirmar'>";
        echo "<input type='submit' name='cancelar' value='Cancelar'>";
        echo "</form>";
    }

    // Funcion que muestra el mensaje de confirmacion de modificacion
    function mostrarConfirmacionModificacion($mensaje)
    {
        echo "<div class='altoDch1'>CONFIRMACION</div>";
        echo "<p>$mensaje</p>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<input type='submit' name='confirmarModificacion' value='Confirmar'>";
        echo "<input type='submit' name='cancelar' value='Cancelar'>";
        echo "</form>";
    }

    // Funcion que muestra el mensaje de confirmacion de insercion
    function mostrarConfirmacionInsercion($mensaje)
    {
        echo "<div class='altoDch1'>CONFIRMACION</div>";
        echo "<p>$mensaje</p>";
        echo "<form action='Tarea2.php' method='post'>";
        echo "<input type='submit' name='confirmarInsercion' value='Confirmar'>";
        echo "<input type='submit' name='cancelar' value='Cancelar'>";
        echo "</form>";
    }




    ?>

</body>

</html>