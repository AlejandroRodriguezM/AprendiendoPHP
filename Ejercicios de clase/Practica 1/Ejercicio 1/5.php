<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title> Imprime 4 variables distintas. </title>
</head>

<body>
    <p>
        <?php

        $entero = 24;
        $float = 758.43;
        $string = "juan";
        $boolean = true;

        printf("Variable entera: %d 
        <br>Variable double: %.2f 
        <br>Variable String: %s 
        <br>Variable boolean: %b",$entero,$float,$string,$boolean);
        
        ?>
    </p>

</body>

</html>