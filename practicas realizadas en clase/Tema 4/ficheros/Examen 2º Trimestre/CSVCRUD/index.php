<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD JSON</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            Lista de Miembros
            <a href="add.php" class="btn btn-success pull-right">Agregar Miembros</a>
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
					  <th colspan="2">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
					include "funciones.php";
					visualizarTablaCSV();
									
					?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>