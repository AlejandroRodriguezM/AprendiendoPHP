<?php
include_once "./Productos.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <textarea id="query" name="query"></textarea>
        <input type="submit" value="Enviar" name="run_query">
        <input type="submit" value="Guardar query" name="save_query">
        <input type="submit" value="Crear tabla" name="save_result">

    </form>
    <?php
    if (isset($_POST['run_query'])) {
        $query = $_POST['query'];
        $productos = new Productos("","","","");
        echo $query;
        $productos->runQuery($query);
    }
    if (isset($_POST['save_query'])) {
        $query = $_POST['query'];
        $productos = new Productos("","","","");

        $productos->guardarBusqueda($query);
    }
    if (isset($_POST['save_result'])) {
        $query = $_POST['query'];
        $table_name = "aux_table";
        $productos = new Productos("","","","");
        $productos->crearTablaAuxiliar($query,$table_name);
    }
    ?>
</body>

</html>