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

    require_once 'MayorMenor.php';


    if (!isset($_COOKIE['lista'])) {
        $lista = array();
        setcookie('lista', serialize($lista), time() + 3600);
    } else {
        if (isset($_POST['agregar'])) {
            $lista = unserialize($_COOKIE['lista']);
            if (!empty($_POST['numero'])) {
                $lista[] = $_POST['numero'];
                setcookie('lista', serialize($lista), time() + 3600);
            }
        }
        if (isset($_POST['mostrar'])) {
            $lista = unserialize($_COOKIE['lista']);
            if (count($lista) > 0) {
                $mayorMenor = new MayorMenor();
                $objeto = $mayorMenor->numeroMayorYMenor($lista);
                echo "El numero mayor es: " . $mayorMenor->getMayor() . "<br>";
                echo "El numero menor es: " . $mayorMenor->getMenor() . "<br>";
            } else {
                echo "No hay numeros en la lista";
            }
        }

        if (isset($_POST['borrar'])) {
            $lista = array();
            setcookie('lista', serialize($lista), time() - 3600);
            header('Location: index.php');
        }
    }

    ?>

    <form action="" method="POST">
        <label for="">Introduce un numero</label>
        <input type="number" name="numero" placeholder="Introduce un numero">
        <input type="submit" value="Agregar" name="agregar">
        <input type="submit" value="Mostrar" name="mostrar">
        <input type="submit" value="borrar" name="borrar">
    </form>
</body>

</html>