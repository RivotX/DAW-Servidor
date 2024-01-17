<?php
if (isset($_REQUEST['data-cod'])) {
    $cod = $_REQUEST['data-cod'];

    if ($cod == 1) {
        echo "Rengar es mi campeon favorito tengo 800k, muy divertido de jugar, increiblemente mecánico y con posibilidad de 1v9. Hoy dia es el unico que juego";
    } else if ($cod == 2) {
        echo "Rek'sai ha sido mi mayor main, con 1M de puntos, es un campeon de gankeo muy completo, con el que más aprendí sobre el juego, me llevo a diamante por primera vez";
        // Agrega más casos según sea necesario
    } else {
        echo "Código no proporcionado.";
    }
}
