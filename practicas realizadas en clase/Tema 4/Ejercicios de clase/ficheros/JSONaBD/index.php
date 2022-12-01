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
					include "funciones.php";
					visualizarTablaJSON();
									
					?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>