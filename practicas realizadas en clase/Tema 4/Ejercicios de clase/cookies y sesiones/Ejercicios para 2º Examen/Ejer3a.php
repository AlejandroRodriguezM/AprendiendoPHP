<!DOCTYPE html>
<html>

<head>
    <title>Colores</title>
    <meta charset="utf-8">
</head>

<body>
    <h1>CREACION Y DESTRUCCIÓN DE COOKIES</h1>
    <p>
        <?php
        if (isset($_POST['accion'])) {
            $accion = $_POST['accion'];
            if ($accion == "Destruir") {
                setcookie('cookieTemporal', '', -1);
                print "Se ha destruido la cookie";
            } elseif ($accion == "Crear") {
                print "La cookie ha sido creada";
                $tiempo = $_POST['tiempo'];
                setcookie('cookieTemporal', time() + $tiempo, time() + $tiempo);
            } else {
                if (isset($_COOKIE['cookieTemporal'])) {
                    $tiempoActual = time();
                    if ($tiempoActual < $_COOKIE['cookieTemporal']) {
                        $tiempo = $_COOKIE['cookieTemporal'] - $tiempoActual;
                        print "Tiempo restante $tiempo";
                    } else {
                        print "La cookie ha caducado";
                    }
                }else{
                    print "No existe la cookie";
                }
            }
        }
        ?>
    </p>
    <p>Elija una opción</p>
    <form method="POST" action="Ejer3a.php">
        <ul>
            <li>
                Crea una cookie con una duración de
                <input type="number" name="tiempo" min="1" max="60">
                segundos (entre 1 y 60)
                <input type="submit" name="accion" value="Crear">
            </li>
            <li>
                Comprobar la cookie <input type="submit" name="accion" value="Comprobar">

            </li>
            <li>
                Destruir la cookie <input type="submit" name="accion" value="Destruir">
            </li>
        </ul>
    </form>
</body>

</html>