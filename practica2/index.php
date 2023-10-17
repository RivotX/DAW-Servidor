<?php
    
echo '<h1> ejercicio 1 </h1>';
$valorCesta = $_POST["valorCesta"];
echo '<p> el valor de la cesta es:' . $valorCesta . '</p>';

$gastosenvio;

if ($valorCesta < 50) {
    $gastosenvio = 3.95;
} elseif ($valorCesta < 75) {
    $gastosenvio = 2.95;
} elseif ($valorCesta < 100) {
    $gastosenvio = 1.95;
} elseif ($valorCesta > 100) {
    $gastosenvio = 0;
} else {
    echo "error";
}

echo "<p> los gastos de envio son: " . $gastosenvio . "</p>";

echo '<h1>2. Realiza un programa en PHP que resuelva el problema anterior con las sentencias condicionales SWITCH-CASE.</h1>';
switch (true) {
    case $valorCesta > 100:
        echo "Los gastos de envío de dicho pedido son: GRATIS !!";
        break;
    case $valorCesta > 75 && $valorCesta <= 100:
        echo "Los gastos de envío de dicho pedido son: 1,95€";
        break;

    case $valorCesta > 50 && $valorCesta < 75:
        echo "Los gastos de envío de dicho pedido son: 2,95€";
        break;
    case $valorCesta < 50:
        echo "Los gastos de envío de dicho pedido son: 3,95€";
        break;

    default:
}

echo '<h1>3. Realiza un programa en PHP que calcule el mayor de 5 números mediante bucle FOR. Los 5 números se obtendrán mediante por pantalla mediante un formulario  </h1>';

$valores3 = $_POST["valores"];

foreach ($valores3 as $valor) {
    echo $valor . "<br>";
}
echo "<br>";

echo "el mayor valor es " . max($valores3);

echo '<h1>4. Realiza un programa en PHP que muestre por pantalla el contenido de la siguiente matriz utilizando el bucle FOREACH. </h1>';

$matriz = array(
    array("3", "2"),
    array("1", "0")
);

foreach ($matriz as $fila) {
    echo "<br>";
    foreach ($fila as $valor) {

        echo $valor . "  ";
    }
}
echo "<h1>5. Realiza un programa en PHP que sume las siguientes matrices y muestre por pantalla el resultado: </h1>";

$matriz1 = array(
    array("1", "0"),
    array("0", "1") // 1 0   0 1
                    // 0 1   1 0
);
$matriz2 = array(
    array("0", "1"),
    array("1", "0")
);

foreach ($matriz1 as $fila) {
    echo "<br>";
    foreach ($fila as $valor) {

        echo $valor . "  ";
    }
}
echo "<br>";

foreach ($matriz2 as $fila) {
    echo "<br>";
    foreach ($fila as $valor) {

        echo $valor . "  ";
    }
}

echo "<hr>";

$matrizresultante = array();
$elemento1 = array();
$elemento2 = array();


for ($i = 0; $i < count($matriz1); $i++) {
    $filaresultado = array();

    for ($j = 0; $j < count($matriz1[0]); $j++) {
        $elemento = $matriz1[$i][$j] + $matriz2[$i][$j];
        $filaresultado[] = $elemento;
    }
    $matrizresultante[] = $filaresultado;
}
echo "el resultado es: ";

foreach ($matrizresultante as $fila) {
    echo "<br>";
    foreach ($fila as $valor) {

        echo $valor . "  ";
    }
}

