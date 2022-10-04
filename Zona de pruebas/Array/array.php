<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <title>Arrays</title>
</head>

<body>
    <div class="container">
        <h1>Recorrer array</h1>
        <?php
        $array = $_SERVER;
        $table = "<table><tr><td>Indice</td><td>Valor</td></tr>";
        foreach ($array as $clave => $valor) {
            $table .= "<tr><td>".$clave."</td><td>".$valor."</td></tr>";
        }
        $table .= "</table>";
        echo $table;
        ?>
    </div>
</body>

</html>