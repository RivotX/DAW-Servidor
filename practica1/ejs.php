<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>1. Crea un archivo PHP para ejecutar en nuestro servidor XAMPP que muestre
        por pantalla lo siguiente: (1 punto)</h2>

    <p><b>a. Variable de tipo String con valor “Hola” concatenada a un espacio y
            concatenada a una variable de tipo String con valor “Mundo”.
            Guarda la concatenación en una nueva variable.</b></p>

    <?php
    $strHola = "Hola";
    echo " variable Hola --> " . $strHola . "<br>";
    $strMundo = "Mundo";
    echo "variable Mundo --> " . $strMundo . "<br>";
    $strHolaMundo = $strHola . " " . $strMundo;
    echo "variable Holamundo = " . $strHolaMundo;
    ?>

    <p> <b>b. Variable de tipo boolean con valor “true”.</b></p>

    <?php
    $boolean = true;

    echo " variable boolean --> " . $boolean . " cuando es true aparece como 1)<br>";
    ?>

    <p><b>c. Variable de tipo float con valor “3,14” </b></p>

    <?php
    $pi = 3.14;
    echo " variable pi --> " . $pi . "<br>";
    ?>
    <p><b>d. Variable de tipo array que contenga los valores “1”, “2” y “3” y
            tengan como clave valor1, valor2 y valor3 respectivamente.</b></p>

    <?php
    $array = array("valor1" => 1, "valor2" => 2, "valor3" => 3);
    $stringarray = implode(", ", $array); //funcion importada de chatgpt 
    echo " variable array --> " . $stringarray . "<br>";

    ?>

    <h2>2 Cambia la variable de tipo boolean a valor “false”. Muestra el resultado
        obtenido al ejecutarlo con el servidor. ¿Qué ocurre y por qué?</h2>

    <?php
    $boolean = false;
    echo $boolean;
    ?>
    <p>No aparece nada porque boolean en falso = 0 = a nada</p>

    <h2>3 Elimina los espacios de la variable concatenada utilizando la función
        correspondiente.</h2>

    <?php
    $HolaMundoSinEspacios = str_replace(" ", "", $strHolaMundo);
    echo $HolaMundoSinEspacios;

    ?>

    <h2>4 Muestra por pantalla el siguiente mensaje:
        El operador “+” sirve para sumar el valor de variables. Con la “/”podemos
        dividir valores entre variables. El símbolo del dólar “$” indica que estamos
        utilizando variables pero no lo usaremos en las constantes o globales. (1
        punto)</h2>

    <?php
    echo 'El operador “+” sirve para sumar el valor de variables. Con la “/”podemos
    dividir valores entre variables. El símbolo del dólar “$” indica que estamos
    utilizando variables pero no lo usaremos en las constantes o globales. (1
    punto)';
    ?>

    <h2>5 Almacena la cadena anterior en una variable y usa la función
        correspondiente para indicar la longitud de la cadena. (1 punto)</h2>

    <?php
    $cadena = 'El operador “+” sirve para sumar el valor de variables. Con la “/”podemos
    dividir valores entre variables. El símbolo del dólar “$” indica que estamos
    utilizando variables pero no lo usaremos en las constantes o globales. (1
    punto)';
    $longitud = strlen($cadena);
    echo "La longitud de la cadena es: " . $longitud;
    ?>

    <h2>6 Utiliza la función correspondiente para eliminar las vocales en la frase
        “Hello World”.</h2>

    <?php
    $frase = "Hello World";
    $vocales = array("a", "e", "i", "o", "u");
    $fraseSinVocales = str_replace($vocales, "", $frase);
    echo $fraseSinVocales;
    ?>

    <h2>7 Crea una variable sin contenido y usa la función correspondiente para
        comprobar si está vacía. ¿Qué ocurre y por qué?</h2>

    <?php

    $vacio;

    echo "la variable vacia muestra lo siguiente--> " . $vacio . "   no muestra nada porque en php las variable vacias, 0, false y algunas mas se no muestran nada en pantalla "

    ?>

    <h2>8 Convierte la variable que contiene la frase “Hello World” y conviértela en
        entero. ¿Qué ocurre y por qué?</h2>
    <?php
    $intFrase = intval($frase);

    echo "la variable muestra lo siguiente--> " . $intFrase . " se debe a que no puede hacer la conversion de string a int,
     por lo que la funcion intval devuelve 0. El 0 no se muestra por pantalla en php";
    ?>

    <h2>9. Crea programas que calcule lo siguiente: (2 puntos)</h2>
    <p><b> a. La raíz cuadrada de 144 </b></p>
    <?php
    $root = sqrt(144);
    echo "la raiz cuadrada de 144 es " . $root

    ?>
    <p><b> b. La potencia 2^8</b></p>
    <?php
    $potencia = pow(2, 8);
    echo $potencia;

    ?>
    <p><b> c. El resto de la división de 100/6</b></p>
    <?php

    $resultado = 100 % 6;

    echo $resultado;


    ?>
    <p><b> d. El máximo común divisor de 3 y 6 </b></p>
    <?php

    $a = 6;
    $b = 3;
    $arrayDivisoresA = [];
    $arrayDivisoresB = [];


    for ($i = 1; $i <= $a; $i++) {
        if ($a % $i == 0) {
            array_push($arrayDivisoresA, $i);
        }
    }

    for ($i = 1; $i <= $b; $i++) {
        if ($b % $i == 0) {
            array_push($arrayDivisoresB, $i);
        }
    }
    $z = implode(", ", $arrayDivisoresA); //para mostrarlo en pantalla
    $zz = implode(", ", $arrayDivisoresB);//para mostrarlo en pantalla

    $elementosComunes = array_intersect($arrayDivisoresA, $arrayDivisoresB);

    $max = max($elementosComunes);
    echo "el resultado es: " . $max;

    ?>
</body>

</html>

</html>





 
