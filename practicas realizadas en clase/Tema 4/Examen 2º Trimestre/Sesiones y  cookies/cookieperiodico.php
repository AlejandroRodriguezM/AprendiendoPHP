<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel=stylesheet href="estilo.css" type=text/css />
</head>

<body>
    <?php
    //Primero leo la cookie por si existe
    if(isset($_COOKIE['seccion'])){
        $opcion = $_COOKIE['seccion'];
    }
    else{
        $opcion = "";
    }
    

    //Si he dado borrar cookie, la borro y anulo el valor de la variable
    //que contiene la cookie para la ejecución acutal
    if (isset($_POST['borrar'])) {
        setcookie('seccion', $opcion, time() - 1);
        $opcion = null;
    }

    //Si he dado enviar es para guardar la cookie
    //La leo del input radio y me guardo ese  valor
    //en una variable para el script actual
    if (isset($_POST['enviar'])) {
        $opcion = $_POST['seccion'];
        setcookie('seccion', $opcion, time() + 3600);
    }

    //Si no hay cookie muestro los radio, si no no los muestro
    //(Decisión personal...)
    if ($opcion == null) {
    ?>
        <h3>Si quieres especifica tu sección favorita y solo verás esa</h3>
        <form action="" method="POST">
            <input type="radio" name="seccion" value="noticias">Noticias<br />
            <input type="radio" name="seccion" value="deporte">Deporte<br />
            <input type="radio" name="seccion" value="economia">Economía<br />
            <input type="submit" value="Recordar" name="enviar">
            <hr /><br /><br />
        </form>
    <?php
        //Si sí que hay cookie y no muestro las opciones de radio
        //Muestro un botón para borrar cookie
    } else {
    ?>
        <h1> En tu última selección de sección seleccionaste <strong><?php echo $opcion ?> </strong> </h1>
        <form action='' method='POST'><input type='submit' value='Borrar Cookie' name='borrar'>
            <hr /><br /><br />
        </form>
    <?php
    }

    //En cada caso mostraré esta sección del supuesto periódico
    //Si es la sección de la cookie (en cuyo caso solo mostraré esta)
    //O si no hay cookie las voy a mostar todas, y por lo tanto también esta ...
    if (($opcion == 'noticias') || ($opcion == null)) :
    ?>
        <div id="secciones">
            <h2>Noticias</h2>
            <p>
                La realidad virtual, además de verse y oírse, ahora puede tocarse.
                Un grupo de estudiantes del London’s Royal College of Art han creado
                un traje que permite sentirla a través del tacto.
                Utiliza solenoides, dispositivos que producen
                campos magnéticos a partir de corrientes eléctricas.
                En este caso crean los campos a partir de diferentes sonidos,
                cuyas vibraciones se sienten en la piel.
                Las distintas frecuencias y ondas sonoras provocan sensaciones variadas.
            </p>
        </div>
    <?php
    endif;
    if (($opcion == 'economia') || ($opcion == null)) :
    ?>
        <div id="secciones">
            <h2>Economía</h2>
            <p>
                La actividad económica española, medida por el producto interior bruto
                (PIB), se multiplicó por 50 entre 1850 y 2015,
                lo que supone una tasa acumulativa anual del 2, 4%.
                Pero, ¿en qué medida afectó a las condiciones de vida de la población?
                Dado que la población se triplicó, el PIB real por habitante
                aumentó alrededor de 16 veces,
                creciendo anualmente, en promedio, al 1, 7%, pero mostrando un ritmo
                desigual.
                Así, entre 1850 y 1950, el PIB per cápita creció al 0, 7%,
                duplicando su nivel inicial.
            </p>
        </div>
    <?php
    endif;
    if (($opcion == 'deporte') || ($opcion == null)) :
    ?>
        <div id="secciones">
            <h2>Deporte</h2>
            <p>
                El español Rafael Nadal derrotó al canadiense Milos Raonic,
                tercer favorito, por 6-4, 7-6 (7) y 6-4 en dos horas y 44 minutos,
                para marcar su victoria 50 en el Abierto de Australia y alcanzar por
                quinta vez las semifinales.
                El campeón de 2009 y finalista en 2012 y 2014,
                se enfrentará por un puesto para la final contra el búlgaro
                Grigor Dimitrov, que derrotó antes al belga David Goffin,
                por 6-3, 6-2 y 6-4, en dos horas y 13 minutos.
                Será la 24 semifinal de Rafael Nadal en el Grand Slam,
            </p>
        </div>
    <?php endif; ?>
</body>

</html>