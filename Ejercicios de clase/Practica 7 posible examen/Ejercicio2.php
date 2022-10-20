<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // Rellena un array de 100 elementos de manera aleatoria con valores M o F (por ejemplo ["M", "M", "F", "M", ...]). 
    // Una vez completado, vuelve a recorrerlo y calcula cuantos elementos hay de cada uno de los valores almacenando 
    // el resultado en un array asociativo ['M' => 44, 'F' => 66] (no utilices variables para contar las M o las F). Finalmente, muestra el resultado por pantalla

    $array = array();
    $arrayAsociativo = array();

    for ($i = 0; $i < 100; $i++) {
        $array[$i] = rand(0, 1) == 0 ? "M" : "F";
    }

    for ($i = 0; $i < 100; $i++) {
        if ($array[$i] == "M") {
            if (isset($arrayAsociativo["M"])) {
                $arrayAsociativo["M"]++;
            } else {
                $arrayAsociativo["M"] = 1;
            }
        } else {
            if (isset($arrayAsociativo["F"])) {
                $arrayAsociativo["F"]++;
            } else {
                $arrayAsociativo["F"] = 1;
            }
        }
    }

    echo "Hay " . $arrayAsociativo["M"] . " hombres y " . $arrayAsociativo["F"] . " mujeres";





    ?>

</body>

</html>