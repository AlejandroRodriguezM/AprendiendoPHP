<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Ruta:</td>
            <td>
            <?php 
            print $_SERVER['PHP_SELF'];
            ?>
            </td>
        </tr>
        <tr>
            <td>Nombre de ruta: </td>
            <td>
            <?php 
            
            print $_SERVER['SERVER_NAME'];
            ?>
            </td>
        </tr>
    </table>
</body>
</html>