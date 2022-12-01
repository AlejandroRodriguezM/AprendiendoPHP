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
                        include "inc/header.inc.php";

                        $tabla = seeTable();
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Aficion</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach ($tabla as $fila) {
                            echo "<tr>";
                            echo "<td>" . $fila['idAficion'] . "</td>";
                            echo "<td>" . $fila['nombreAficion'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        $_SESSION['nom_tabla'] = 'aficiones';

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>