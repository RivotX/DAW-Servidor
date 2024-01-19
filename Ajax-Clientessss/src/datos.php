<?php
if (isset($_REQUEST['data-cod'])) {
    $cod = $_REQUEST['data-cod'];

    if ($cod == 1) {
        echo "<h2 class='mb-5 text-xl font-bold text-center'>Rengar</h2>Rengar es mi campeon favorito tengo 800k, muy divertido de jugar, increiblemente mecánico y con posibilidad de 1v9. Hoy dia es el unico que juego";
    } else if ($cod == 2) {
        echo "<h2 class='mb-5 text-xl font-bold text-center'>Rek'Sai</h2>Rek'sai ha sido mi mayor main, con 1M de puntos, es un campeon de gankeo muy completo, con el que más aprendí sobre el juego, me llevo a diamante por primera vez";
    } else if ($cod == 3) {
        echo "<h2 class='mb-5 text-xl font-bold text-center'>Jarvan IV</h2>JarvanIV es, junto a Elise mi campeón de reserva, cuando me banean a mis mains o me apetece jugar algo extra";
    } else if ($cod == 4) {
        echo "<h2 class='mb-5 text-xl font-bold text-center'>Lee Sin</h2>Lee sin fué mi primer OTP, alcancé 700k, lo jugaba cuando tenia 14 años y estaba en bronce, no entendia el macro del juego, pero mi lee sin era mecanicamente INCREIBLE, solo que era muy pequeñito y no entendía nada de items ni objetivos. Con el aprendí a jugar mecnaicamente al juego";
    } else if ($cod == 5) {
        echo "<h2 class='mb-5 text-xl font-bold text-center'>Elise</h2>Elise es mi jungla ap, campeon de gank muy versatil con un early game increible, fue el campeon que me llevó a oro";
    } else if ($cod == 6) {
        echo "<h2 class='mb-5 text-xl font-bold text-center'>Zac</h2>Aunque ya apenas lo juego, merece estar en el top como mi opción de jungla ultra tanque para teamfights, estaba en mi champion pull hasta hace no mucho ";
    } else {
        echo "Código no proporcionado.";
    }
}
