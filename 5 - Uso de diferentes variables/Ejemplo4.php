<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Document</title>
</head>

<body>
    <p>

        <?php
        $control = "El servidor no está activo";
        $dia = date("d");
        if ($dia > 10)
            $control = "El servidor está activo";
        print "CONTROL DEL SERVIDOR:$control";
        ?>

    </p>
</body>

</html>