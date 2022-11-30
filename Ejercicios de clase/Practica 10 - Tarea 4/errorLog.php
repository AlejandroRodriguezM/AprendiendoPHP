<?php
include "./inc/header.inc.php";
deleteCookieLoginError();
deleteCookieUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <video id="joke-video" controls width="500" autoplay muted controls loop>
            <source src="img/test.mp4" type="video/mp4">
        </video>
    </center>
    <center>
        <input type="submit" name='return' id="return" value="volver a menu Principal" onclick="toggleMute();">
        <div id="cronometro"></div>
    </center>

</body>

<script>
    function toggleMute() {
        let cronometro = document.getElementById("cronometro");
        let segundos = 10;
        let decimas = 0;
        let intervalo;
        var video = document.getElementById("joke-video")

        if (video.muted) {
            video.muted = false;
            intervalo = setInterval(function() {
                decimas++;
                if (decimas == 10) {
                    segundos--;
                    decimas = 0;
                }
                if (segundos == 0) {
                    clearInterval(intervalo);
                    window.location.href = "index.php";
                }
                cronometro.innerHTML = "Segundos restantes:" + segundos;
            }, 100);
        } else {
            video.muted = true;
            clearInterval(intervalo);
        }
    }
</script>

</html>