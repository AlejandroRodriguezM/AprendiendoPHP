<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Exportar a csv</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Miembros
                <a href="exportData.php" class="btn btn-success pull-right">Exportar Miembros</a>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Creado</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include './inc/header.inc.php';
                        $tabla = seeTable();
                        foreach ($tabla as $fila) {
                            echo "<tr>";
                            echo "<td>" . $fila['nombre'] . "</td>";
                            echo "<td>" . $fila['email'] . "</td>";
                            echo "<td>" . $fila['telefono'] . "</td>";
                            echo "<td>" . $fila['creado'] . "</td>";
                            if ($fila['estado'] == 1) {
                                echo "<td>Activo</td>";
                            } else {
                                echo "<td>Inactivo</td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>