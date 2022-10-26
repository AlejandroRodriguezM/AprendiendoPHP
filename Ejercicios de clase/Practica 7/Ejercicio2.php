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

//crear un array compuesto por M o F segun si el random es 0 o 1 usando arra_count_values


    $array = array();

    

    for ($i = 0; $i < 100; $i++) {
        $array[$i] = rand(0, 1);
        if($array[$i] == 0){
            $array[$i] = "M";
        }else{
            $array[$i] = "F";
        }
    }

    $array = array_count_values($array);

    foreach ($array as $key => $value) {
        echo $key . " = " . $value . "<br>";
    }

    ?>

</body>

</html>